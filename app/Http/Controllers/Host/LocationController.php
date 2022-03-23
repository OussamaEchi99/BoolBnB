<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Category;
use App\Feature;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        $data = [
            'locations' => $locations
        ];

        return view('host.locations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $features = Feature::all();

        $data = [
            'categories' => $categories,
            'features' => $features
        ];

        return view('host.locations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $request->validate($this->getValidationRules());
        $new_location = new Location();
        $new_location->fill($form_data);
        
        $new_location->slug = $this->getUniqueSlugFromName($form_data['name']);

        $new_location->save();

        if(isset($form_data['features'])) {
            $new_location->features()->sync($form_data['features']);
        }

        return redirect()->route('host.locations.show', ['location' => $new_location->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);

        $data = [
            'location' => $location
        ];
        
        return view('host.locations.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $categories = Category::all();
        $features = Feature::all();

        $data = [
            'location' => $location,
            'categories' => $categories,
            'features' => $features
        ];

        return view('host.locations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('host.locations.index');
    }

    protected function getValidationRules() {
        return [
            'name' => 'required|max:50',
            'photo' => 'image|max:1024',
            'rooms' => 'required|min:1',
            'beds' => 'required|min:1',
            'bathrooms' => 'required|min:1',
            'square_meters' => 'required|min:1',
            'price' => 'nullable',
            'description' => 'nullable|max:60000'
        ];
    }

    protected function getUniqueSlugFromName($name) {
        $slug = Str::slug($name);
        $slug_base = $slug;
        
        $location_found = Location::where('slug', '=', $slug)->first();
        $counter = 1;
        while($location_found) {
            $slug = $slug_base . '-' . $counter;
            $location_found = Location::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}

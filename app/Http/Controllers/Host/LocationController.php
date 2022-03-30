<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Category;
use App\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $locations = Location::all();
        $locations_filtered = Location::where('user_id','=',Auth::id())->get();
        $data = [
            'locations' => $locations_filtered
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

        // Save Cover Img
        if (isset($form_data['image'])) {

            // 1- Salvo l'immagine caricata nella cartella di Storage
            $img_path = Storage::put('location_photos', $form_data['image']);

            // 2- Salvo il path dell'immagine nella colonna cover del database
            $new_location->photo = $img_path;
        }

        $new_location->user_id = Auth::id();

        $new_location->save();

        // Se sono presenti servizi, li salvo nel database
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
        $form_data = $request->all();

        // dd($form_data);
        $request->validate($this->getValidationRules());

        $location = Location::findOrFail($id);

        // Aggiorna lo slug se l'utente modifica il titolo
        if($form_data['name'] != $location->name) {
            $form_data['slug'] = Location::getUniqueSlugFromName($form_data['name']);
        }

        if($form_data['image']) {
            // Cancella il file precedente
            if($location->photo) {
                Storage::delete($location->photo);
            }

            // Upload del nuovo file
            $img_path = Storage::put('location_photos', $form_data['image']);

            // Salva nella colonna photo il path al nuovo file
            $form_data['photo'] = $img_path;
        }

        // if($form_data['image']) {
        //     if($post->cover) {
        //         Storage::delete($post->cover);
        //     }
        //     $img_path = Storage::put('post_covers', $form_data['image']);
        //     $form_data['cover'] = $img_path;
        // }

        $location->update($form_data);

        if(isset($form_data['features'])) {
            $location->features()->sync($form_data['features']);
        } else {
            // Se non esiste la chiave features in form_data
            // significa che l'utente ha rimosso il check dalle features
            // quindi se questa location aveva delle features collegate le rimuovo
            $location->features()->sync([]);
        }

        return redirect()->route('host.locations.show', ['location' => $location->id]);
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
        $location->features()->sync([]);
        $location->sponsors()->sync([]);

        // Se ha un'immagine la cancello
        if ($location->photo) {
            Storage::delete($location->photo);
        }

        $location->delete();

        return redirect()->route('host.locations.index');
    }

    protected function getValidationRules() {
        return [
            'name' => 'required|max:50',
            'photo' => 'image|max:1024',
            'city' => 'required|max:100',
            'address' => 'required|max:255',
            'number' => 'required|min:1',
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

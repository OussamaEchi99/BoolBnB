<?php

use Illuminate\Database\Seeder;
use App\Feature;
use Illuminate\Support\Str;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            'Wifi',
            'Piscina',
            'Cucina',
            'Garage',
            'Veranda',
            'Aria condizionata',
            'Barbecue',
            'Ricarica per macchina elettrica'
        ];

        foreach($features as $feature) {
            $new_feature = new Feature();
            $new_feature->name = $feature;
            $new_feature->slug = Str::slug($feature);
            $new_feature->save();
        }
    }
}

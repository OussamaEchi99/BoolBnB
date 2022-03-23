<?php

use Illuminate\Database\Seeder;
use App\Visual;
use App\Location;
// use Carbon\Carbon;

class VisualsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visuals = 10;
        
        for ( $i = 0; $i < $visuals; $i++) { 
            $new_visual = new Visual();
            $new_visual->ip = rand(1000000000, 4294967295);
            $new_visual->date = date("Y-m-d");
            $new_visual->location_id = 1;
            $new_visual->save();
        }
    }
}

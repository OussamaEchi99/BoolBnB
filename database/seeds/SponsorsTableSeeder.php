<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use Illuminate\Support\Str;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'subscription'=>'Gold',
                'description'=>'Durata massima in cima alla ricerca',
                'price'=>9.99,
                'duration'=>144
            ],
            [
                'subscription'=>'Silver',
                'description'=>'Durata media in cima alla ricerca',
                'price'=>5.99,
                'duration'=>72
            ],
            [
                'subscription'=>'Bronze',
                'description'=>'Durata di un giornata in cima alla ricerca',
                'price'=>2.99,
                'duration'=>24
            ]
        ];        

        foreach($sponsors as $sponsor) {
            $new_sponsor = new Sponsor();
            $new_sponsor->subscription = $sponsor['subscription'];
            $new_sponsor->slug = Str::slug($sponsor['subscription']);
            $new_sponsor->description = $sponsor['description'];
            $new_sponsor->price = $sponsor['price'];
            $new_sponsor->duration = $sponsor['duration'];
            $new_sponsor->save();
        }
    }
}

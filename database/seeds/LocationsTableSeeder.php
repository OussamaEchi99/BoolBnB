<?php

use Illuminate\Database\Seeder;
use App\Location;
use Illuminate\Support\Str;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_location = new Location();
        $new_location->name = 'Barberini Maison';
        $new_location->slug = Str::slug($new_location->name);
        $new_location->photo = 'https://a0.muscache.com/im/pictures/ed6f2251-3140-4896-8559-10f6bf997c01.jpg?im_w=1200';
        $new_location->country = 'Italy';
        $new_location->city = 'Roma';
        $new_location->address = 'Via Flaminia';
        $new_location->number = 23;
        $new_location->lat = 41.9109;
        $new_location->long = 12.4818;
        $new_location->rooms = 1;
        $new_location->beds = 2;
        $new_location->bathrooms = 1;
        $new_location->square_meters = 60;
        $new_location->price = 60;
        $new_location->visible = 1;
        $new_location->description = "Appartamento con soffitto a cassettoni dipinti a mano del 1500 nel cuore del centro storico di Roma, a due passi da Fontana di Trevi, Trinita' dei Monti e dalla fermata Barberini della linea A della metropolitana. Dotato di tutti i comfort (aria condizionata, wifi, riscaldamento autonomo, camino, ascensore, smart tv wifi di ultima generazione 4k, prese elettriche internazionali e usb). Ideale per una coppia ma può comodamente ospitare fino a 4 persone utilizzando il divano letto.";
        $new_location->save();
    }
}

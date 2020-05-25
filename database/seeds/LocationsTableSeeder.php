<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loc = new Location();
        $loc->border = "Cabadiangan";
        $loc->save();

        $loc = new Location();
        $loc->border = "Calero";
        $loc->save();

        $loc = new Location();
        $loc->border = "Catarman";
        $loc->save();

        $loc = new Location();
        $loc->border = "Cotcot";
        $loc->save();

        $loc = new Location();
        $loc->border = "Jubay";
        $loc->save();

        $loc = new Location();
        $loc->border = "Lataban";
        $loc->save();

        $loc = new Location();
        $loc->border = "Mulao";
        $loc->save();
        
        $loc = new Location();
        $loc->border = "Poblacion";
        $loc->save();

        $loc = new Location();
        $loc->border = "San Roque";
        $loc->save();

        $loc = new Location();
        $loc->border = "San Vicente";
        $loc->save();

        $loc = new Location();
        $loc->border = "Santa Cruz";
        $loc->save();

        $loc = new Location();
        $loc->border = "Tabla";
        $loc->save();
        
        $loc = new Location();
        $loc->border = "Tayud";
        $loc->save();

        $loc = new Location();
        $loc->border = "Yati";
        $loc->save();
    }
}

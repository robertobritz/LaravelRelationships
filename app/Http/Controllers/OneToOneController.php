<?php

namespace App\Http\Controllers;

use App\Models\Contry;
use App\Models\Location;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public function OneToOne()
    {
       $country = Contry::where('name', 'China')->get()->first();
    
       echo $country->name;

       $location = $country->location;

       echo "<hr>Latitude: ($location->latitude)<br>";
       echo "<hr>Logetude: ($location->longetude)<br>";
    }

    public function OneToOneInverse()
    {
       $latitude = 123;
       $longetude =321;

       $location = Location::where('latitude', $latitude)
                            ->where('longetude', $longetude)
                            ->get()
                            ->first();
    
        $contry = $location->contry;
        echo $contry->name;
    }

    public function insert(){
        $dataform = [
            'name' => 'chile',
            'latitude' => 525,
            'longetude' => 717,
        ];
      
        $contry = Contry::create($dataform); 
         // $dataform['contry_id'] = $contry->id; 
        //$location = Location::create($dataform);
        
        /*2º método
        $location = new Location;
        $location->latitude = $dataform['latitude'];
        $location->longetude = $dataform['longetude'];
        $location->contry_id = $contry->id;
        $saveLocation = $location->save();
        */

        $location = $contry->location()->create($dataform);
    

    }
}

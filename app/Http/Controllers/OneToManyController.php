<?php

namespace App\Http\Controllers;

use App\Models\Contry;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function OneToMany()
    {
       //$contries = Contry::get();
       $keysearch = 'a';
       $contries = Contry::where('name','LIKE', "%$keysearch%")->get();//retorna a array com todos os objetos
       // dd($contries);
       foreach ($contries as $contry)
       {
        echo "(<b>$contry->name)</b>";

        $states = $contry->states()->get(); //retorna a array de estados

        foreach ($states as $state) {
            echo "<br>($state->initials) - ($state->name)";
        }
            echo "<hr>";
       } 
    }

    public function ManyToOne()
    {
        $stateName = 'Rio Grande do Sul';
        $state = State::where('name', $stateName)->get()->first();
        echo "<br> $state->name </br>";

        $contry = $state->contry;
        echo "<br>País: $contry->name </br>";
    }

    public function OneToManyTwo()
    {
       //$contries = Contry::get();
       $keysearch = 'a';
       $contries = Contry::where('name','LIKE', "%$keysearch%")->get();//retorna a array com todos os objetos
       // dd($contries);
       foreach ($contries as $contry)
       {
        echo "(<b>$contry->name)</b>";

        $states = $contry->states()->get(); //retorna a array de estados

        foreach ($states as $state) {
            echo "<br>($state->initials) - ($state->name)";

        foreach ($state->cities as $city) {
            echo " $city->name, ";
        }

        }
            echo "<hr>";
       } 
    }

    public function OneToManyInsert(){
        $dataForm = [
            'name'      => 'Bahia',
            'initials'  => 'BH',
        ];

        $contry = Contry::find(1);

        $insertState= $contry->states()->create($dataForm);
        var_dump($insertState->name);
    }

    public function OneToManyInsert2(){
        $dataForm = [
            'name'      => 'Amazonas',
            'initials'  => 'AM',
            'contry_id' => 1,
        ];

              $insertState= State::create($dataForm);
        var_dump($insertState->name);
    }

    public function hasManyThrough(){
        $contry = Contry::find(1);
        echo "<b>$contry->name</b><br>";

        $cities = $contry->cities;

        foreach ($cities as $city){
            echo " $city->name, <br>";
        }
        //echo "<br>Total Cidade: $cities->count()"; / ta dando erro
    }
}

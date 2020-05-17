<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Comment;
use App\Models\Contry;
use App\Models\State;
use Illuminate\Http\Request;

class PolymorphiController extends Controller
{
    public function polimorphic (){
        $city = city::where('name', 'Feliz')->get()->first();
        echo "<b> $city->name </b><br>";

        $comments = $city->comments()->get();

        foreach ($comments as $comment) {
            echo " $comment->description <br>";
        }

    
        $state = State::where('name', 'Rio Grande do Sul')->get()->first();
        echo "<b> $state->name </b><br>";

        $comments = $state->comments()->get();

        foreach ($comments as $comment) {
            echo " $comment->description <br>";
        }
        

        $contry = Contry::where('name', 'Brasil')->get()->first();
        echo "<b> $contry->name </b><br>";

        $comments = $contry->comments()->get();

        foreach ($comments as $comment) {
            echo "$comment->description <br>";
        }
        



    }
    /*
    public function polimorphicInsert(){
        $city = city::where('name', 'Feliz')->get()->first();
        echo "Cidade: $city->name ";

        $comment = $city->comments()->create([
            'description' => "New Comment ($city->name)".date('YmdHis'),
        ]);

        var_dump($comment->description);
    }
        */
    /*public function polimorphicInsert(){
        $state = State::where('name', 'Rio Grande do Sul')->get()->first();
        echo "Estado: $state->name ";

        $comment = $state->comments()->create([
            'description' => "New Comment STATE ($state->name)".date('YmdHis'),
        ]);

        var_dump($comment->description);
    }
    */
    public function polimorphicInsert(){
        $contry = Contry::where('name', 'Brasil')->get()->first();
        echo "Pais: $contry->name ";

        $comment = $contry->comments()->create([
            'description' => "New Comment ($contry->name)".date('YmdHis'),
        ]);

        var_dump($comment->description);
    }
}

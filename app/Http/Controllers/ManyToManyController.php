<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function manyToMany(){
        $city = city::where('name', 'Feliz')->get()->first();
        echo "$city->name <br>";

        $companies = $city->companies;

        foreach ($companies as $company){
            echo "Companias $company->name; <br>";
        }
    }
    
    public function manyToManyInverse(){
        $companies = Company::where('name', 'Star Pex')->get()->first();
        echo "$companies->name <br>";

        $cities = $companies->cities;

        foreach ($cities as $city){
           echo "Cidade de: $city->name; <br>";
        }
    }

    public function manyToManyInsert(){
        $dataForm = [1,2, 6, 5
        ];

        $company = Company::where('name', 'Star Pex')->get()->first();//apenas pra recuperarar
        echo "<b> $company->name :</b><br>";
        $company->cities()->attach($dataForm); // adicionar dados 
        $company->cities()->sync($dataForm); // para sincronizar os dados que foram digitados excluindo os diferentes.
        $company->cities()->detach($dataForm); // para excluir os dados que foram digitados excluindo os diferentes.

        $cities = $company->cities;

        foreach ($cities as $city){
           echo "Cidade de: $city->name; <br>";
        }

    }

}
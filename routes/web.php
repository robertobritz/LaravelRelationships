<?php

use Illuminate\Support\Facades\Route;

route::get('one-to-one', 'OneToOneController@OneToOne');
route::get('one-to-one-inverse', 'OneToOneController@OneToOneInverse');
route::get('one-to-one-insert', 'OneToOneController@insert');

route::get('one-to-many', 'OneToManyController@OneToMany');
route::get('many-to-one', 'OneToManyController@ManyToOne');
route::get('one-to-many-two', 'OneToManyController@OneToManyTwo');
route::get('one-to-many-insert', 'OneToManyController@OneToManyInsert');
route::get('one-to-many-insert2', 'OneToManyController@OneToManyInsert2');
 
route::get('has-many-through', 'OneToManyController@hasManyThrough');


route::get('many-to-many', 'ManyToManyController@manyToMany');
route::get('many-to-many-inverse', 'ManyToManyController@manyToManyInverse');
route::get('many-to-many-insert', 'ManyToManyController@manyToManyInsert');


route::get('polimorphics', 'PolymorphiController@polimorphic');
route::get('polimorphics-insert', 'PolymorphiController@polimorphicInsert');


Route::get('/', function () {
    return view('welcome');
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GetAndCollectData;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    use GetAndCollectData;

    public function api()
    {
        $array = [
            "people" => "api/people/",
            "planets"=> "api/planets/",
            "films"=> "api/films/",
            "species"=> "api/species/",
            "vehicles"=> "api/vehicles/",
            "starships"=> "api/starships/"
        ];
        return $array;
    }


}

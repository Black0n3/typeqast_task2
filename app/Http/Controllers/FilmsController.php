<?php

namespace App\Http\Controllers;

use App\Traits\GetAndCollectData;
use App\Traits\FilterCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FilmsController extends Controller
{
    use GetAndCollectData, FilterCollection;

    public function index(Request $request)
    {
        // caching films for 60 min better preformance
        $films = Cache::remember('films', 60*60, function () {
            // get data
            $data = $this->getData('films');
            // check if exist more of 1 page and collect data
            $collection = $this->collectData($data, 'films');
            return $collection;
        });

        // filter by titile if has search parameter
        if($request->has('search')){
            $films = $this->filter($films ,'title' , $request->search);
        }

        // filter by date if request has date parameter
        if($request->has('date')){
            $films = $this->filterByCreatedAfter($films, $request->date);
        }

        return $films;
    }

    public function show($id)
    {
        return $this->getData('films/'.$id);
    }

    public function type(Request $request, $id, $type)
    {
        $accepted_types = ['characters','planets' ,'starships', 'vehicles', 'species'];
        $items = [];

        // check if type is accepted
        if(!in_array($type, $accepted_types)){
            return ['detail' => 'Unsupported type'];
        }

        // get single item
        $single_item = $this->getData('films/'.$id);

        foreach($single_item[$type] as $item){
            $items[] = $this->getDataByFullUrl($item);
        }

        // filter data by type if request has filter
        if($request->has('filter')){
            $items = $this->filterDataByType($items, $request->filter);
        }

        return $items;
    }

    public function show_all($id)
    {
        // caching films for 60 min better preformance
        $film = Cache::remember('films_'.$id, 60*60*24*7, function () use ($id) {
            $film = $this->getData('films/'.$id);

            $more_info = ['characters', 'planets', 'starships', 'vehicles', 'species'];
            $new_array = [];
            foreach($more_info as $info){

                foreach($film[$info] as $item){
                    $new_array[$info][] = $this->getDataByFullUrl($item);
                }
            }

            return array_replace($film, $new_array);

        });

        return $film;
    }

}

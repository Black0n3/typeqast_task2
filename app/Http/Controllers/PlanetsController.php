<?php

namespace App\Http\Controllers;

use App\Traits\GetAndCollectData;
use App\Traits\FilterCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlanetsController extends Controller
{
    use GetAndCollectData, FilterCollection;

    public function index(Request $request)
    {
        // caching planets for 60 min better preformance
        $planets = Cache::remember('planets', 60*60, function () {
            // get data
            $data = $this->getData('planets');
            // check if exist more of 1 page and collect data
            $collection = $this->collectData($data, 'planets');
            return $collection;
        });

        // search if has search parameter
        if($request->has('search')){
            $planets = $this->filter($planets ,'name' , $request->search);
        }

        // search date if has date parameter
        if($request->has('date')){
            $planets = $this->filterByCreatedAfter($planets, $request->date);
        }

        return $planets;
    }

    public function show($id)
    {
        return $this->getData('planets/'.$id);
    }

    public function type(Request $request, $id, $type)
    {
        $accepted_types = ['residents','films'];
        $items = [];

        // check if type is accepted
        if(!in_array($type, $accepted_types)){
            return ['detail' => 'Unsupported type'];
        }

        // get item
        $single_item = $this->getData('planets/'.$id);

        // get and set data for selected type
        foreach($single_item[$type] as $item){
            $items[] = $this->getDataByFullUrl($item);
        }

        // filter data by type if request has filter
        if($request->has('filter')){
            $items = $this->filterDataByType($items, $request->filter);
        }

        return $items;

    }
}

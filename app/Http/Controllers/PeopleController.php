<?php

namespace App\Http\Controllers;

use App\Traits\GetAndCollectData;
use App\Traits\FilterCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PeopleController extends Controller
{
    use GetAndCollectData, FilterCollection;

    public function index(Request $request)
    {
        // caching people 60 min for better preformance
        $people = Cache::remember('people', 60*60, function () {
            // get data
            $data = $this->getData('people');
            // check if exist more of 1 page and collect data
            $collection = $this->collectData($data, 'people');
            return $collection;
        });

        // filter by name if request has search parameter
        if($request->has('search')){
            $people = $this->filter($people ,'name' , $request->search);
        }

        // filter by date if request has date parameter
        if($request->has('date')){
            $people = $this->filterByCreatedAfter($people, $request->date);
        }

        return $people;
    }

    public function show($id)
    {
        return $this->getData('people/'.$id);
    }

    public function type(Request $request, $id, $type)
    {
        $accepted_types = ['films','species','vehicles','starships'];
        $items = [];

        // check if type is accepted
        if(!in_array($type, $accepted_types)){
            return ['detail' => 'Unsupported type'];
        }

        // get single item
        $single_item = $this->getData('people/'.$id);

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

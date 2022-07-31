<?php

namespace App\Http\Controllers;

use App\Traits\GetAndCollectData;
use App\Traits\FilterCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StarshipsController extends Controller
{
    use GetAndCollectData, FilterCollection;

    public function index(Request $request)
    {
        // caching starships 60 min for better preformance
        $starships = Cache::remember('starships', 60*60, function () {
            // get data
            $data = $this->getData('starships');
            // check if exist more of 1 page and collect data
            $collection = $this->collectData($data, 'starships');
            return $collection;
        });

        // search if has search parameter
        if($request->has('search')){
            $starships = $this->filter($starships ,'name' , $request->search);
        }

        // filter by date if request has date parameter
        if($request->has('date')){
            $starships = $this->filterByCreatedAfter($starships, $request->date);
        }

        return $starships;
    }

    public function show($id)
    {
        return $this->getData('starships/'.$id);
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
        $single_item = $this->getData('starships/'.$id);

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

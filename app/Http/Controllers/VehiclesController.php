<?php

namespace App\Http\Controllers;

use App\Traits\GetAndCollectData;
use App\Traits\FilterCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehiclesController extends Controller
{
    use GetAndCollectData, FilterCollection;

    public function index(Request $request)
    {
        // caching vehicles 60 min for better preformance
        $vehicles = Cache::remember('vehicles', 60*60, function () {
            // get data
            $data = $this->getData('vehicles');
            // check if exist more of 1 page and collect data
            $collection = $this->collectData($data, 'vehicles');
            return $collection;
        });

        // search if has search parameter
        if($request->has('search')){
            $vehicles = $this->filter($vehicles ,'name' , $request->search);
        }

        // filter by date if request has date parameter
        if($request->has('date')){
            $vehicles = $this->filterByCreatedAfter($vehicles, $request->date);
        }

        return $vehicles;
    }

    public function show($id)
    {
        return $this->getData('vehicles/'.$id);
    }

    public function type(Request $request, $id, $type)
    {
        $accepted_types = ['pilots','films'];
        $items = [];

        // check if type is accepted
        if(!in_array($type, $accepted_types)){
            return ['detail' => 'Unsupported type'];
        }

        // get single item
        $single_item = $this->getData('vehicles/'.$id);

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

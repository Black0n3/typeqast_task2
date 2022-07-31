<?php
namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

trait FilterCollection
{
    protected function filter($data, $field = null, $parameter = null)
    {
        return $data->filter(function ($item) use($parameter, $field){
            return strpos($item[$field], $parameter) !== false;
        });

    }

    protected function filterByCreatedAfter ($data, $date = "12/04/2014")
    {
        Carbon::parse($date)->format('Y-m-d');
        // 2014-12-09T13:50:49.641000Z
        return $data->filter(function ($item) use($date){
            return $date <=  Carbon::parse($item['created'])->format('Y-m-d');
        });

    }

    protected function filterDataByType($data, $filter)
    {

        $filter = explode(":", $filter);
        $filter_field = $filter[0];
        $filter_parameter = $filter[1];

        // check if field is found
        if(!strpos(json_encode($data), $filter_field) > 0){
            return ['detail' => 'Filter field not found!'];
        }
        // convert data to collection
        $data = collect($data);

        // filter data by parameted and field
        return $data->filter(function ($item) use($filter_parameter, $filter_field){
            return $item[$filter_field] > $filter_parameter;
        });



    }

}

<?php
namespace App\Traits;
use Illuminate\Support\Facades\Http;

trait GetAndCollectData
{
    protected function getData($url = null)
    {
        $api_url = config('app.api_url');
        $response = Http::get($api_url . $url);
        $jsonData = $response->json();

        return $jsonData;
    }

    protected function getDataByFullUrl($url = null)
    {
        $response = Http::get($url);
        $jsonData = $response->json();

        return $jsonData;
    }


    protected function collectData($data = null, $url = null)
    {
        $collection = $data['results'];
        $count = $data['count'];
        $no_of_pages = 1;

        if($count >= 11){
            $no_of_pages = ceil($count / 10);
            for ($x = 2; $x <= $no_of_pages; $x++) {
                $pagginate_data = $this->getData($url.'?page='. $x);
                $collection = array_merge($collection, $pagginate_data['results']);
            }
        }

        return collect($collection);
    }

}

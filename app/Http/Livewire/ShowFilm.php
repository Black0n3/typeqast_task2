<?php

namespace App\Http\Livewire;

use App\Traits\GetAndCollectData;
use Livewire\Component;

class ShowFilm extends Component
{
    use GetAndCollectData;

    public $films = [];
    public $film;
    public $film_id;
    public $characters;
    public $planets;
    public $starships;
    public $vehicles;
    public $species;

    public function mount()
    {
        $this->films = $this->getDataByFullUrl(env('APP_URL').'/api/films');
    }

    public function render()
    {

        return view('livewire.show-film');
    }

    public function change(){
        //$parts = explode("/", $url);
        //echo end($parts);
        if($this->film_id==""){
            $this->film = "";
        }else{
            $this->film = $this->films[$this->film_id];
            $url_parts = explode("/", $this->film['url']);
            $url_id = $url_parts[count($url_parts)-2];

            $this->film = $this->getDataByFullUrl(env('APP_URL').'api/films/'.$url_id.'/show_all');
        }


    }
}

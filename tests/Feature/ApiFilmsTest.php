<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiFilmsTest extends TestCase
{

    public function test_api_url_for_films()
    {
        $response = $this->get('/api/films');
        $response->assertStatus(200);


    }

    public function get_json_data_from_films_endpoint()
    {
        $response = $this->json('get', '/api/films');
        $response->assertStatus(200);
    }

    public function get_json_data_from_film_endpoint()
    {
        $response = $this->json('get', '/api/film/1');
        $response->assertStatus(200);
    }

    public function get_json_data_from_film_type_endpoint()
    {
        $response = $this->json('get', '/api/film/1/planets');
        $response->assertStatus(200);
    }

    public function get_json_data_from_filtred_data_endpoint()
    {
        $response = $this->json('get', '/api/film/1/starships/?filter=passengers:10');
        $response->assertStatus(200);
    }
}

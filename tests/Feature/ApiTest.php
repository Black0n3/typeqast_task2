<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic api test.
     *
     * @return void
     */
    public function test_main_api_url()
    {
        $response = $this->get('/api');
        $response->assertStatus(200);
    }

    public function test_films_api_url()
    {
        $response = $this->get('/api/films');
        $response->assertStatus(200);
    }

    public function test_people_api_url()
    {
        $response = $this->get('/api/people');
        $response->assertStatus(200);
    }

    public function test_planets_api_url()
    {
        $response = $this->get('/api/planets');
        $response->assertStatus(200);
    }

    public function test_species_api_url()
    {
        $response = $this->get('/api/species');
        $response->assertStatus(200);
    }

    public function test_starships_api_url()
    {
        $response = $this->get('/api/starships');
        $response->assertStatus(200);
    }
}

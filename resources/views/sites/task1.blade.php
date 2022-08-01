@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12 text-center">
        <h1>Welcome to {{ config('app.name', 'Task 2') }}</h1>
        <h2>Made by: Antun Jalovičar</h2>
    </div>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-sm-10">
        <h3>1. Showing all films where involved a given character acts</h3>
        <p><strong>Endpoint</strong></p>
        <ul>
            <li><code>/api/people/:id/:type</code></li>
        </ul>
        <pre>accepted types: <code>['films','species','vehicles','starships']</code></pre>
        <p></p>
        <p><strong>Example request:</strong></p>
        <pre><code>/api/people/1/films</code></pre>
        <p><strong>Example response:</strong></p>
        <pre><code>HTTP/1.0 200 OK
            Content-Type: application/json
            {
                array[
                    "title": string,
                    "episode_id": integer,
                    "opening_crawl": string,
                    "director": string,
                    "producer": string,
                    "release_date": date,
                    "characters": array[],
                    "planets": array[],
                    "starships": array[],
                    "vehicles": array[],
                    "species": array[],
                    "created": datetime,
                    "edited": datetime
                ],
            }</code></pre>
            <p></p>


            <h3 class="mt-4 pt-4">2 . Showing all planets created after 12/04/2014</h3>
            <p><strong>Endpoint</strong></p>
            <ul>
                <li><code>/api/planets/?filter=(:type):(:value)</code></li>
            </ul>
            <p><strong>Example request:</strong></p>
            <pre><code>/api/planets?date=2014-04-12</code></pre>
            <p><strong>Example response:</strong></p>
            <pre><code>HTTP/1.0 200 OK
                Content-Type: application/json
                {
                    array[
                        "name": string,
                        "rotation_period": integer,
                        "orbital_period": integer,
                        "diameter": integer,
                        "climate": string,
                        "gravity": string,
                        "terrain": string,
                        "surface_water": integer,
                        "population": integer,
                        "residents": array[],
                        "films": array[],
                    ],
                }</code></pre>

            <h3 class="mt-4 pt-4">2 . Showing all planets created after 12/04/2014</h3>
            <p><strong>Endpoint</strong></p>
            <ul>
                <li><code>/api/planets/?DATE=:date(YYYY-MM-DD)</code></li>
            </ul>
            <p><strong>Example request:</strong></p>
            <pre><code>/api/planets?date=2014-04-12</code></pre>
            <p><strong>Example response:</strong></p>
            <pre><code>HTTP/1.0 200 OK
                Content-Type: application/json
                {
                    array[
                        "name": string,
                        "rotation_period": integer,
                        "orbital_period": integer,
                        "diameter": integer,
                        "climate": string,
                        "gravity": string,
                        "terrain": string,
                        "surface_water": integer,
                        "population": integer,
                        "residents": array[],
                        "films": array[],
                    ],
                }</code></pre>


                <p></p>
                <h3 class="mt-4 pt-4">3 . Showing peaple starships which have above 84000 passenger in total</h3>
                <p><strong>Endpoint</strong></p>
                <ul>
                    <li><code>/api/people/1/starships?filter=(:type):(:value)</code></li>
                </ul>
                <pre>accepted types: <code>['films','species','vehicles','starships']</code></pre>
                <p><strong>Example request:</strong></p>
                <pre><code>/api/people/1/starships?filter=passengers:10</code></pre>
                <pre><code>/api/people/1/starships?filter=crew:5</code></pre>
                <pre><code>/api/people/1/vehicles?filter=length:2</code></pre>
                <p><strong>Example response:</strong></p>
                <pre><code>HTTP/1.0 200 OK
                    Content-Type: application/json
                    {
                        array[
                            "name": string,
                            "model": string,
                            "manufacturer": string,
                            "cost_in_credits": integer,
                            "length": integer,
                            "max_atmosphering_speed": integer,
                            "population": integer,
                            "crew": integer,
                            "passengers": integer,
                            "cargo_capacity": integer,
                            "consumables": string,
                            "starship_class": string,
                            "hyperdrive_rating": string,
                            "pilots": array[],
                            "films": array[],
                        ],
                    }</code></pre>
    </div>
</div>
@endsection

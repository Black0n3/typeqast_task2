@extends('layouts.app')
@section('content')
<?php
$url = 'https://port-3000-tabardi-demo-blackone.codeanyapp.com/Typeqast/task2/public/';
?>
<div class="row justify-content-center">
    <div class="col-sm-12">
        <h1>Documentation</h1>
        <h3>Getting started</h3>
        <p>Let's make our first API request to the Star Wars extended API!</p>
        <pre><code>http {{ $url }}api/planets/1/
        </code></pre>

        <h3>Base URL</h3>
        <pre><code>{{ $url }}
        </code></pre>
        <h3>Root</h3>
        <p>The Root resource provides information on all available resources within the API.</p>
        <p><strong>Example request:</strong></p>
        <pre><code>/api/
        </code></pre>
        <p><strong>Example response:</strong></p>
        <pre><code>HTTP/1.0 200 OK
            Content-Type: application/json
            {
                "films": "api/films/",
                "people": "api/people/",
                "planets": "api/planets/",
                "species": "api/species/",
                "starships": "api/starships/",
                "vehicles": "api/vehicles/"
            }
            </code></pre>
            <p><strong>Attributes:</strong></p>
            <ul>
                <li><code>films</code> <em>string</em>
                -- The URL root for Film resources</li>
                <li><code>people</code> <em>string</em>
                -- The URL root for People resources</li>
                <li><code>planets</code> <em>string</em>
                -- The URL root for Planet resources</li>
                <li><code>species</code> <em>string</em>
                -- The URL root for Species resources</li>
                <li><code>starships</code> <em>string</em>
                -- The URL root for Starships resources</li>
                <li><code>vehicles</code> <em>string</em>
                -- The URL root for Vehicles resources</li>
                </ul>

            <h3>People</h3>
            <p><strong>Endpoints</strong></p>
            <ul>
                <li><code>/people/</code> -- get all the people resources</li>
                <li><code>/people/:id/</code> -- get a specific people resource</li>
                <li><code>/people/:id/type/</code> -- get all data type for specific people resource</li>
            </ul>










    </div>
</div>
@endsection

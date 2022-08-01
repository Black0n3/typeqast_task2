@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-sm-12">
        <h1>Documentation</h1>
        <h3>Getting started</h3>
        <div class="card">
            <div class="card-body text-dark">
                <p> Sva primarna dokumentacija dostupna je na <code>https://swapi.dev</code> <br>
                    Svi endpointi su isto tako važeći na testnoj aplikaciji.</p>
                <p>Potrebno je samo zamjeniti primarni url sa mojim <br> <code>{{ env('APP_URL') }}</code></p>
            </div>
        </div>

    </div>
</div>
@endsection

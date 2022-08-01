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
    <div class="col-sm-6">
        <div class="alert alert-info">
            Moguće duže vrijeme čekanja zbog sporog API-ja ukoliko se prvi put očitava odabrani film.
        </div>
        <h3>Showing all information of a Films </h3>
        @livewire('show-film')
    </div>
</div>
@endsection

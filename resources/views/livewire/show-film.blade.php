<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="p-2 bg-light rounded text-dark">
                <select name="films" class="form-select" wire:model="film_id" wire:change="change">
                    <option value="">Select a film</option>
                    @foreach ($films as $key => $film_info)
                        <option value="{{ $key }}">{{ $film_info['title'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div wire:loading>
        Loading movie data...
    </div>
    @if($film)
    <div class="row mt-3">
        <div class="col-sm-12">
            <h3>{{ $film['title'] }}</h3>
            <div class="p-2 bg-light rounded text-dark">
                <h3>Film information</h3>

                {{ $film['opening_crawl'] }}
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Director</th>
                            <td>{{ $film['director'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Producer</th>
                            <td>{{ $film['producer'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Release date</th>
                            <td>{{ $film['release_date'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Created</th>
                            <td>{{ $film['created'] }}</td>
                        </tr>


                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="p-2 bg-light rounded text-dark">
                <h3>Characters</h3>
                <div class="row">
                    @foreach($film['characters'] as $character)
                        <div class="col-sm-3 text-center mb-2">
                            <img
                                src="{{ asset('images/avatar.png') }}"
                                class="person rounded-circle shadow-sm mb-1"
                                style="width:50px; height:50px;"
                                alt="Avatar"
                            >

                              <h6>{{ $character['name'] }}</h6>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="p-2 bg-light rounded text-dark">
                <h3>Planets</h3>
                <div class="row">
                    @foreach($film['planets'] as $planet)
                        <div class="col-sm-3 text-center mb-2">
                            <img
                                src="{{ asset('images/planet.png') }}"
                                class="person rounded-circle shadow-sm mb-1"
                                style="width:50px; height:50px;"
                                alt="Planet"
                            >

                              <h6>{{ $planet['name'] }}</h6>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="p-2 bg-light rounded text-dark">
                <h3>Starships</h3>
                <div class="row">
                    @foreach($film['starships'] as $starships)
                        <div class="col-sm-3 text-center mb-2">
                            <img
                                src="{{ asset('images/spaceship.png') }}"
                                class="person rounded-circle shadow-sm mb-1"
                                style="width:50px; height:50px;"
                                alt="Starships"
                            >

                              <h6>{{ $starships['name'] }}</h6>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="p-2 bg-light rounded text-dark">
                <h3>species</h3>
                <div class="row">
                    @foreach($film['species'] as $species)
                        <div class="col-sm-3 text-center mb-2">
                            <img
                                src="{{ asset('images/species.png') }}"
                                class="person rounded-circle shadow-sm mb-1"
                                style="width:50px; height:50px;"
                                alt="Species"
                            >

                              <h6>{{ $species['name'] }}</h6>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="p-2 bg-light rounded text-dark">
                <h3>Vehicles information</h3>
                <table class="table">
                    <tbody>
                        @foreach($film['vehicles'] as $vehicle)
                            <tr>
                                <td>{{ $vehicle['name'] }} - {{ $vehicle['model'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    @endif
</div>

# Typeqast API (laravel) tasks by Antun Jalovičar 


## API tasks

### 1. Showing all films where involved a given character acts

Endpoint
- /api/people/:id/:type
> accepted types: ['films','species','vehicles','starships']

Example request:
```
/api/people/1/films
```

Example response:
```
HTTP/1.0 200 OK
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
    }
```

### 2. Showing all planets created after 12/04/2014

Endpoint

- /api/planets/?filter=(:type):(:value)

Example request:
```
/api/planets?date=2014-04-12
```

Example response:
```
HTTP/1.0 200 OK
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
    }
```

### 3. Showing peaple starships which have above 84000 passenger in total

Endpoint
- /api/people/1/starships?filter=(:type):(:value)

> accepted types: ['films','species','vehicles','starships']

Example request:
```
/api/people/1/starships?filter=passengers:10
```
```
/api/people/1/starships?filter=crew:5
```
```
/api/people/1/vehicles?filter=length:2
```

Example response:
```
HTTP/1.0 200 OK
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
    }
```

## Frontend task

### 1. Showing all information of a Films

Show all information of film module with livewire

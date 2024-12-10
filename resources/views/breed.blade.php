@extends('layouts.app')

@section('title', 'Cats')

@section('content')
    <a href="/">Go back</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Quality</th>
            <th scope="col">Data</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Name</th>
            <td>{{$cat['name']}}</td>
        </tr>
        @if(isset($cat['reference_image_id']))
            <tr>
                <th>Image</th>
                <td><img class="img-fluid" src="https://cdn2.thecatapi.com/images/{{$cat['reference_image_id']}}.jpg">
                </td>
            </tr>
        @endif

        @if(isset($cat['vetstreet_url']))
            <tr>
                <th>Vetstreet</th>
                <td><a href="{{$cat['vetstreet_url']}}">{{$cat['name']}} on vetstreet</a></td>
            </tr>
        @endif

        <tr>
            <th>Temperament</th>
            <td>{{$cat['temperament']}}</td>
        </tr>

        <tr>
            <th>Description</th>
            <td>{{$cat['description']}}</td>
        </tr>

        <tr>
            <th>Origin</th>
            <td>{{$cat['origin']}} ({{$cat['country_code']}})</td>
        </tr>

        <tr>
            <th>Life span</th>
            <td>{{$cat['life_span']}} years</td>
        </tr>

        <tr>
            <th>Indoor</th>
            <td>{{$cat["indoor"]}}</td>
        </tr>
        @if(isset($cat["alt_names"]))
            <tr>
                <th>Alternative names</th>
                <td>{{$cat["alt_names"]}}</td>
            </tr>
        @endif
        <tr>
            <th>Adaptability</th>
            <td>{{$cat["adaptability"]}}</td>
        </tr>
        <tr>
            <th>Affection Level</th>
            <td>{{$cat["affection_level"]}}</td>
        </tr>
        <tr>
            <th>Child Friendly</th>
            <td>{{$cat["child_friendly"]}}</td>
        </tr>
        <tr>
            <th>Dog Friendly</th>
            <td>{{$cat["dog_friendly"]}}</td>
        </tr>
        <tr>
            <th>Energy Level</th>
            <td>{{$cat["energy_level"]}}</td>
        </tr>
        <tr>
            <th>Grooming</th>
            <td>{{$cat["grooming"]}}</td>
        </tr>
        <tr>
            <th>Health Issues</th>
            <td>{{$cat["health_issues"]}}</td>
        </tr>
        <tr>
            <th>Intelligence</th>
            <td>{{$cat["intelligence"]}}</td>
        </tr>
        <tr>
            <th>Shedding Level</th>
            <td>{{$cat["shedding_level"]}}</td>
        </tr>
        <tr>
            <th>Social Needs</th>
            <td>{{$cat["social_needs"]}}</td>
        </tr>
        <tr>
            <th>Stranger Friendly</th>
            <td>{{$cat["stranger_friendly"]}}</td>
        </tr>
        <tr>
            <th>Vocalisation</th>
            <td>{{$cat["vocalisation"]}}</td>
        </tr>
        <tr>
            <th>Experimental</th>
            <td>{{$cat["experimental"]}}</td>
        </tr>
        <tr>
            <th>Hairless</th>
            <td>{{$cat["hairless"]}}</td>
        </tr>
        <tr>
            <th>Natural</th>
            <td>{{$cat["natural"]}}</td>
        </tr>
        <tr>
            <th>Rare</th>
            <td>{{$cat["rare"]}}</td>
        </tr>
        <tr>
            <th>Rex</th>
            <td>{{$cat["rex"]}}</td>
        </tr>
        <tr>
            <th>Suppressed Tail</th>
            <td>{{$cat["suppressed_tail"]}}</td>
        </tr>
        <tr>
            <th>Short Legs</th>
            <td>{{$cat["short_legs"]}}</td>
        </tr>
        @if(isset($cat["wikipedia_url"]))
            <tr>
                <th>Wikipedia</th>
                <td><a href="{{$cat["wikipedia_url"]}}">{{$cat["wikipedia_url"]}}</a></td>
            </tr>
        @endif
        <tr>
            <th>Hypoallergenic</th>
            <td>{{$cat["hypoallergenic"]}}</td>
        </tr>

        </tbody>
    </table>
    <a href="/">Go back</a>
@endsection

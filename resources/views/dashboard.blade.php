@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form class="d-flex justify-content-center w-100" style="max-width: 800px;" action="/search">
        <div class="position-relative w-100">
            <input id="searchPet" name="searchPet" list="breedsDataList"
                   class="form-control me-2 rounded-5 form-control-lg"
                   type="search" placeholder="Search" aria-label="Search">
            <datalist id="breedsDataList">
                @foreach($breeds as $breed)
                    <option value="{{$breed['name']}}">{{$breed['name']}}</option>
                @endforeach
            </datalist>
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>

    <h4>Available breeds</h4>
    <ul class="list-inline">
        @foreach($breeds as $breed)
            <li class="list-inline-item"><a href="/miao/{{$breed['id']}}">{{$breed['name']}}</a></li>
        @endforeach
    </ul>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('searchInput').focus();

            const titles = [
                "Searching for a Cat Breed?",
                "Find Your Perfect Feline Companion",
                "Explore Cat Breeds by Trait",
                "Which Breed is Right for Your Family?",
                "Find Cat Breeds with Unique Traits"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });
    </script>
@endpush

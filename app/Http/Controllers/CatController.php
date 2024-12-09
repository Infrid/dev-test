<?php

namespace App\Http\Controllers;

use App\Services\CatService;
use Illuminate\Support\Facades\App;

class CatController extends BaseController
{
    public function breeds()
    {
        $service = app::make(CatService::class);
        return view('miao', $service->getBreeds());
    }

    public function breed($breedId){
        $service = app::make(CatService::class);
        return view('breed', $service->getBreed($breedId));
    }
}

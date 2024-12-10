<?php

namespace App\Http\Controllers;

use App\Services\CatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

/**
 * Controller for herding cats
 */
class CatController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function breeds()
    {
        $service = app::make(CatService::class);
        return view('dashboard', ['breeds' => $service->getBreeds()]);
    }

    /**
     * @param $breedId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function breed($breedId)
    {
        $service = app::make(CatService::class);
        $data = $service->getBreedById($breedId);
        return view('breed', ['cat' => $data]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function search(Request $request)
    {
        $service = app::make(CatService::class);
        $catId = $service->getBreedIdByName($request->get('searchPet'));
        if ($catId) {
            return redirect()->route('miao', [$catId]);
        }
        return redirect('home');
    }
}

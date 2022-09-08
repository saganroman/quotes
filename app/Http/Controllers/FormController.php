<?php

namespace App\Http\Controllers;

use App\Services\PkgStoreService;
use Illuminate\Contracts\View\View;

class FormController extends Controller
{

    /**
     * @param PkgStoreService $pkgStoreService
     * @return View
     */
    public function index(PkgStoreService $pkgStoreService): View
    {
        return view('searchForm', ['companies' => $pkgStoreService->getData()]);
    }
}

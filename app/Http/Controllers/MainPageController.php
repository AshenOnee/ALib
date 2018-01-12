<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainPageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        //$brands = DB::select('SELECT name, id FROM brand;');
        $result = Brand::all();
        $cars = array();

        return view('main', ['brands' => $result, 'cars' => $cars]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QueryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function query($id_brand)
    {
        $cars = array();
        echo $id_brand;
//        $result = DB::select('SELECT model.id, brand.name, brand.id, model.name, model.power FROM brand, model WHERE model.id_brand = brand.id AND brand.id =?', [$id_brand]);
//
//        return json_encode($result);
    }
}
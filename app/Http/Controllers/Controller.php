<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function query($id_brand){
        $result = \App\Model\Model::all();

        $result->load('brand');
        $cars = array();
        foreach ($result as $item)
            if($item->brand['id'] == $id_brand)
                $cars[] = array('id'=>$item['id'],
                    'brand_id' => $item->brand['id'],
                    'brand' => $item->brand['name'],
                    'model' => $item['name'],
                    'power' => $item['power']);

        return $cars;
    }

    public function getDiscription($id){
        $result = \App\Model\Model::all();
        $result->load('brand');
        $car = array();
        foreach ($result as $item)
            if($item['id']==$id){
                $car = $item;
                break;
            }
        return view('discription', ['car' => $car]);
    }
}

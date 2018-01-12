<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use App\Model\Model;
use Illuminate\Http\Request;
use Mockery\Exception;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brand_id = $request->get('brand_id');

        if($brand_id  == "") return view('createmodel', ['message'=>'Заполните поле brand_id']);
        if(!is_numeric($brand_id )) return view('createmodel', ['message'=>'Введено некорректное значение в поле brand_id']);

        $brand = Brand::find($brand_id);
        if($brand == null) return view('createmodel', ['message'=>'По заданому brand_id не найдено марки автомобиля']);

        $name = $request->get('name');
        if($name == "") return view('createmodel', ['message'=>'Заполните поле name']);

        $power = $request->get('power');
        if($power  == "") return view('createmodel', ['message'=>'Заполните поле power']);
        if(!is_numeric($power )) return view('createmodel', ['message'=>'Введено некорректное значение в поле power']);

        $file = $request->file('image');
        if(is_null($file)) return view('createmodel', ['message'=>'Выберите файл']);

        $discription = $request->get('discription');
        if($discription == "") return view('createmodel', ['message'=>'Заполните поле text']);

        $model = new Model();
        if (!is_null($file)){
            $fileName = time() .' '.$file->getClientOriginalName();
            $file->move(public_path() . '/img', $fileName);
            $model->image = '/img/'. $fileName;
        }

        $model->name = $request->get('name');
        $model->brand_id = $request->get('brand_id');
        $model->power = $request->get('power');
        $model->discription = $request->get('discription');
        $model->save();
        return redirect('/tables/models');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        $file = $request->file('image');
        if (!is_null($file)){
            $fileName = time() .' '.$file->getClientOriginalName();
            $file->move(public_path() . '/img', $fileName);
            $model->image = '/img/'. $fileName;
        }

        $model->name = $request->get('name');
        $model->brand_id = $request->get('brand_id');
        $model->power = $request->get('power');
        $model->discription = $request->get('discription');
        $model->save();
        return redirect('/tables/models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        $model->delete();
    }
}

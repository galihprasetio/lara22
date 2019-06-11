<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = \App\Category::all();
        $data = [
            'categories' => $category
        ];
        return view('admin.category.index')->with($data);
    }
    public function show($id)
    {
        //$id=Input::get('id');

        $category = \App\Category::find($id);

        $data = [
            'category' => $category
        ];

        return view('admin/category/show')->with($data);
    }
    public function edit($id)
    {
        $category = \App\Category::find($id);
        $data = [
            'category' => $category
        ];
        return view('admin/category/edit')->with($data);
    }
    public function update($id)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required'
        ];
        $message = [
            'name.required' => 'name cant empty'
        ];
        $validator = Validator::make(Input::all(), $rules, $message);
        if ($validator->fails()) {
            # code...
            return Redirect::to('admin/category/{id}/edit')->withErrors($validator);
        } else {
            # code...
            $category = \App\Category::find($id);
            $category->name = Input::get('name');
            // $category->name = 'By Script';
            $category->status = Input::get('status');
            $category->save();

            Session::flash('message', 'data has been updated');

            return Redirect::to('admin/category');
        }
    }
    public function create()
    {
        return view('admin/category/create');
    }
    public function store()
    {
        $rules = [
            'name'   => 'required',
            'status' => 'required'
        ];
        $message = [
            'name.required' => 'name cant empty'
        ];
        $validator = Validator::make(Input::all(), $rules, $message);
        if ($validator->fails()) {
            # code...
            return Redirecto::to('/admin/category/create')->withErrors($validator);
        } else {
            # code...
            $category = new \App\Category;
            $category->name = Input::get('name');
            $category->status = Input::get('status');
            $category->save();

            Session::flash('message', 'data has been saved');
            return Redirect::to('/admin/category');
        }
    }
    public function delete($id)
    {
        $category = \App\Category::find($id);
        $category->delete();

        Session::flash('message', 'data has been deleted');
        return Redirect::to('admin/category');
    }
}

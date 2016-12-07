<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Szykra\Notifications\Flash;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogs = Catalog::all();
        return view('categories.create')->with('catalogs', $catalogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name'   => 'required',
            'description'    => 'required',
            'catalog_id'    => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return Redirect::to('/categories/create')
                ->withErrors($validator);

        $category = new Category();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->catalog_id = $request->get('catalog_id');
        $category->save();
        Flash::success('Category Added', 'Category has been added successfully.');
        return redirect()->action('CategoriesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogs = Catalog::all();
        $category = Category::find($id);
        return view('categories.edit')
            ->with('catalogs', $catalogs)
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = array(
            'name'   => 'required',
            'description'    => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return Redirect::to('/categories/'.$id.'/edit')
                ->withErrors($validator);

        $category = Category::find($id);

        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->catalog_id = $request->get('catalog_id');
        $category->save();
        Flash::success('Category Updated', 'Category has been updated successfully.');
        return view('categories.edit')
            ->with('category', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();
        Flash::error('Category Deleted', 'Category has been deleted successfully.');
        return redirect()->action('CategoriesController@index');
    }
}

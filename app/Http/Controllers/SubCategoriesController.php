<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::where('is_pack','=',0)->get();
        return view('sub-categories.index')
            ->with('subCategories', $subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('sub-categories.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|max:255',
        ]);

        $subCategories = new SubCategory();
        $subCategories->name = $request->get('name');
        $subCategories->description = $request->get('description');
        $subCategories->category_id = $request->get('category_id');
        $subCategories->is_pack = 0;
        $subCategories->save();

        return redirect()->action('SubCategoriesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategory = SubCategory::find($id);
        return view('sub-categories.show')
            ->with('subCategory', $subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('sub-categories.edit')
            ->with('subCategory', $subCategory)
            ->with('categories', $categories);
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
        $subCategory = SubCategory::find($id);
        $categories = Category::all();

        $subCategory->name = $request->get('name');
        $subCategory->description = $request->get('description');
        $subCategory->category_id = $request->get('category_id');
        $subCategory->save();

        return view('sub-categories.edit')
            ->with('subCategory', $subCategory)
            ->with('categories', $categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->action('SubCategoriesController@index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use App\SubCategoryProduct;
use Illuminate\Http\Request;

use App\Http\Requests;

class PacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packs = SubCategory::where('is_pack','=',1)->get();

        return view('packs.index')
            ->with('packs', $packs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('packs.create')
            ->with('products', $products)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategories = new SubCategory();
        $subCategories->name = $request->get('name');
        $subCategories->description = $request->get('description');
        $subCategories->category_id = $request->get('category_id');
        $subCategories->is_pack = 1;
        $subCategories->save();
        foreach ($request->get('products') as $product){
            $subCategoryProducts = new SubCategoryProduct();
            $subCategoryProducts->sub_category_id = $subCategories->id;
            $subCategoryProducts->product_id = $product;
            $subCategoryProducts->save();
        }


        return redirect()->action('PacksController@index');
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
        $subCategoryProducts = SubCategoryProduct::where('sub_category_id','=',$subCategory->id)->get();
        return view('packs.show')
            ->with('subCategoryProducts', $subCategoryProducts)
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
        $products = Product::all();
        $categories = Category::all();
        $subCategory = SubCategory::find($id);
        $subCategoryProducts = SubCategoryProduct::where('sub_category_id','=',$subCategory->id)->get();
        $categories = Category::all();
        return view('packs.edit')
            ->with('subCategory', $subCategory)
            ->with('subCategoryProducts', $subCategoryProducts)
            ->with('products', $products)
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
        $subCategories = SubCategory::find($id);
        $subCategories->name = $request->get('name');
        $subCategories->description = $request->get('description');
        $subCategories->category_id = $request->get('category_id');
        $subCategories->is_pack = 1;
        $subCategories->save();
        if ($request->get('products'))
        foreach ($request->get('products') as $product){
            $subCategoryProducts = new SubCategoryProduct();
            $subCategoryProducts->sub_category_id = $subCategories->id;
            $subCategoryProducts->product_id = $product;
            $subCategoryProducts->save();
        }


        return redirect()->action('PacksController@index');
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

        $subCategoryProducts = SubCategoryProduct::where('sub_category_id','=',$subCategory->id)->get();
        foreach ($subCategoryProducts as $subCategoryProduct)
            $subCategoryProduct->delete();

        $subCategory->delete();


        return redirect()->action('PacksController@index');
    }
}

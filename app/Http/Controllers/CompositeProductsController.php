<?php

namespace App\Http\Controllers;

use App\Category;
use App\CompositeProductMap;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompositeProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $composites = CompositeProductMap::groupBy('parent')->get();

        return view('composite-products.index')
            ->with('composites', $composites);
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
        return view('composite-products.create')
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
        foreach ($request->get('children') as $child){
            $compositeProductMap = new CompositeProductMap();
            $compositeProductMap->parent = $request->get('parent');
            $compositeProductMap->child = $child;
            $compositeProductMap->save();
        }


        return redirect()->action('CompositeProductsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compositeProductMap = CompositeProductMap::where('parent','=',$id)->get();
        $parent = Product::find($id);
        return view('composite-products.show')
            ->with('parent', $parent)
            ->with('children', $compositeProductMap);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = CompositeProductMap::where('parent','=',$id)->get();
        foreach ($products as $product)
        $product->delete();
        return redirect()->action('CompositeProductsController@index');
    }
}

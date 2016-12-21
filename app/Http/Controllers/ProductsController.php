<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Category;
use App\CompositeProductMap;
use App\Customdata;
use App\CustomFieldSubCategory;
use App\CustomFieldType;
use App\Product;
use App\ProductSymbol;
use App\Project;
use App\SubCategory;
use App\SubCategoryProduct;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Szykra\Notifications\Flash;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('is_composite','=',0)->get();
        $compositeProducts = Product::where('is_composite','=',1)->get();
        $packs = DB::table('products')
            ->join('sub_category_products', 'products.id', '=', 'sub_category_products.product_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'sub_category_products.sub_category_id')
            ->select('sub_categories.*')
            ->where('sub_categories.is_pack','=', true)
            ->groupBy('sub_categories.id')
            ->get();

        $out = [];
        
        foreach ($products as $product){
            $tmp = [];
            $tmp['name'] = $product->name;
            $tmp['description'] = $product->description;
            $tmp['type'] = 'Product';
            $tmp['more_url'] = 'products/'.$product->id;
            $tmp['edit_url'] = 'products/'.$product->id.'/edit';
            $tmp['delete_url'] = 'products/'.$product->id.'/delete';
            $out[] = $tmp;
        }
        foreach ($compositeProducts as $compositeProduct){
            $tmp = [];
            $tmp['name'] = $compositeProduct->name;
            $tmp['description'] = $compositeProduct->description;
            $tmp['type'] = 'Composite Product';
            $tmp['more_url'] = 'products/'.$compositeProduct->id;
            $tmp['edit_url'] = 'products/'.$compositeProduct->id.'/edit';
            $tmp['delete_url'] = 'products/'.$compositeProduct->id.'/delete';
            $out[] = $tmp;
        }
        foreach ($packs as $pack){
            $tmp = [];
            if(SubCategory::find($pack->id)){
            $tmp['name'] = $pack->name;
            $tmp['description'] = $pack->description;
            $tmp['type'] = 'Pack';
            $tmp['more_url'] = 'packs/'.$pack->id;
            $tmp['edit_url'] = 'packs/'.$pack->id.'/edit';
            $tmp['delete_url'] = 'packs/'.$pack->id.'/delete';
            $out[] = $tmp;}
        }
        
        
        


        return view('products.index')
            ->with('products', $out);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('products.create_main');
        $subCategories = SubCategory::all();
        $categories = Category::all();
        $catalogs = Catalog::all();
        return view('products.create')
            ->with('catalogs', $catalogs->toArray())
            ->with('categories', $categories)
            ->with('subCategories', $subCategories);
    }
    
    public function createProduct()
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();
        $catalogs = Catalog::all();
        $symbols = ProductSymbol::all();


        if(session('sub_category_id') == null){
            return view('products.create')
                ->with('catalogs', $catalogs)
                ->with('categories', $categories)
                ->with('symbols',  $symbols)
                ->with('fields', [])
                ->with('is_composite',  false)
                ->with('subCategories', $subCategories);
        }else{

            $customFields = CustomFieldSubCategory::where('sub_category_id','=',session('sub_category_id'))->get();
            $out = [];
            foreach ($customFields as $customField){
                $out[] = [
                    'id'=>$customField->id,
                    'name'=>$customField->name,
                    'type'=>CustomFieldType::find($customField->custom_field_type_id)->name,
                    'is_mandatory'=>$customField->is_mandatory
                ];

            }
            $symbols = ProductSymbol::where('category_id','=',session('category_id'))->get();
            return view('products.create')
                ->with('catalogs', $catalogs)
                ->with('categories', $categories)
                ->with('fields', $out)
                ->with('is_composite',  false)
                ->with('symbols', $symbols)
                ->with('subCategories', $subCategories);
        }




    }
    public function createCompositeProduct()
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();
        $catalogs = Catalog::all();
        $symbols = ProductSymbol::all();


        if(session('sub_category_id') == null){
            return view('products.create')
                ->with('catalogs', $catalogs)
                ->with('categories', $categories)
                ->with('symbols',  $symbols)
                ->with('fields', [])
                ->with('is_composite',  true)
                ->with('subCategories', $subCategories);
        }else{

            $customFields = CustomFieldSubCategory::where('sub_category_id','=',session('sub_category_id'))->get();
            $out = [];
            foreach ($customFields as $customField){
                $out[] = [
                    'id'=>$customField->id,
                    'name'=>$customField->name,
                    'type'=>CustomFieldType::find($customField->custom_field_type_id)->name,
                    'is_mandatory'=>$customField->is_mandatory
                ];

            }
            $symbols = ProductSymbol::where('category_id','=',session('category_id'))->get();
            return view('products.create')
                ->with('catalogs', $catalogs)
                ->with('categories', $categories)
                ->with('fields', $out)
                ->with('is_composite',  true)
                ->with('symbols', $symbols)
                ->with('subCategories', $subCategories);
        }




    }
    public function createPackProduct()
    {
        $categories = Category::all();
        $catalogs = Catalog::all();
        $symbols = ProductSymbol::all();
        
            return view('products.create_pack')
                ->with('catalogs', $catalogs)
                ->with('categories', $categories)
                ->with('symbols', $symbols);
        




    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {// dd($request->all());

        $rules = array(
            'name'   => 'required',
            'description'    => 'required',
            'manufacturing_product_code' => 'required',
            'builder_code'    => 'required',
            'pronto_code'      => 'required',
            'builders_price'      => 'required',
            'sales_price'      => 'required',
            'discount'      => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return Redirect::to('/products/create/product')
                ->withErrors($validator);


        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->manufacturing_product_code = $request->get('manufacturing_product_code');
        $product->builder_code = $request->get('builder_code');
        $product->pronto_code = $request->get('pronto_code');
        $product->builders_price = $request->get('builders_price');
        $product->sales_price = $request->get('sales_price');
        $product->discount = $request->get('discount');
        $product->is_composite = $request->get('is_composite');
        $product->save();

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'custom_field') !== false) {
                $custom_field_sub_category_id = substr($key, 13);
                $customData = new Customdata();
                $customData->product_id = $product->id;
                $customData->custom_field_sub_category_id = $custom_field_sub_category_id;
                $customData->value = $value;
                $customData->save();
            }
        }

        $subcategoeyProduct = new SubCategoryProduct();
        $subcategoeyProduct->sub_category_id =$request->get('sub_category_id');
        $subcategoeyProduct->product_id = $product->id;
        $subcategoeyProduct->save();
        
        $products = Product::all();

        if($request->get('is_composite') == true){
            Flash::success('Composite Product Added', 'Composite Product has been added successfully.');
            return view('products.drag_n_drop')
                ->with('product_id',$product->id )
                ->with('existingComposites',[] )
                ->with('products',$products );
        }

        Flash::success('Product Added', 'Product has been added successfully.');
        return redirect()->action('ProductsController@index');

    }

public function addPack(Request $request)
    {// dd($request->all());

        $rules = array(
            'name'   => 'required',
            'description'    => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return Redirect::to('/products/create/pack')
                ->withErrors($validator);


        $subCategory = new SubCategory();
        $subCategory->name = $request->get('name');
        $subCategory->description = $request->get('description');
        $subCategory->is_pack = true;
        $subCategory->save();


        $products = Product::all();

        Flash::success('Pack Added', 'Pack has been added successfully.');
        return view('products.drag_n_drop_packs')
            ->with('pack_id',$subCategory->id )
            ->with('products',$products );



    }


    public function updateDragndrop(){
        $compositeProductMap = new CompositeProductMap();
        $compositeProductMap->parent = Input::get('parent');
        $compositeProductMap->child = Input::get('child');
        $compositeProductMap->save();
    }
    public function removeDragndrop(){
        $compositeProductMap = CompositeProductMap::where('parent','=',Input::get('parent'))
            ->where('child','=',Input::get('child'))
            ->first();
        $compositeProductMap->delete();
    }

    public function updatePackDragndrop(){
        $subCategoryProduct = new SubCategoryProduct();
        $subCategoryProduct->sub_category_id = Input::get('parent');
        $subCategoryProduct->product_id = Input::get('child');
        $subCategoryProduct->save();
    }
    public function removePackDragndrop(){
        $subCategoryProduct = SubCategoryProduct::where('sub_category_id','=',Input::get('parent'))
            ->where('product_id','=',Input::get('child'))
            ->first();
        $subCategoryProduct->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $catalogs = Catalog::all();
        $product = Product::find($id);
        $subCategories = SubCategory::all();
        $selectedSubCategory = DB::table('sub_category_products')
            ->join('sub_categories', 'sub_categories.id', '=', 'sub_category_products.sub_category_id')
            ->where('product_id','=',$product->id)
            ->where('sub_categories.is_pack','=',0)
            ->first();

        return view('products.edit')
            ->with('product', $product)
            ->with('selectedSubCategory', $selectedSubCategory)
            ->with('subCategories', $subCategories)
        ->with('catalogs', $catalogs)
        ->with('categories', $categories)
        ->with('subCategories', $subCategories);
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
            'description'    => 'required',
            'manufacturing_product_code' => 'required',
            'builder_code'    => 'required',
            'pronto_code'      => 'required',
            'builders_price'      => 'required',
            'sales_price'      => 'required',
            'discount'      => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return Redirect::to('/products/'.$id.'/edit')
                ->withErrors($validator);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->manufacturing_product_code = $request->get('manufacturing_product_code');
        $product->builder_code = $request->get('builder_code');
        $product->pronto_code = $request->get('pronto_code');
        $product->builders_price = $request->get('builders_price');
        $product->sales_price = $request->get('sales_price');
        $product->discount = $request->get('discount');
        $product->image = $request->get('image');
        $product->save();

        $subcategoeyProduct = SubCategoryProduct::where('product_id','=',$product->id)->first();
        $subcategoeyProduct->sub_category_id =$request->get('sub_category_id');
        $subcategoeyProduct->save();


        $subCategories = SubCategory::all();
        Flash::success('Product Updated', 'Product has been updated successfully.');
        return view('products.edit')
            ->with('product', $product)
            ->with('subCategories', $subCategories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Flash::error('Product Deleted', 'Product has been deleted successfully.');
        return redirect()->action('ProductsController@index');
    }

    public function manageComposites($id)
    {
        $existingComposites = CompositeProductMap::where('parent','=',$id)->get();
        $products = Product::all();
        return view('products.drag_n_drop')
            ->with('product_id',$id )
            ->with('existingComposites',$existingComposites )
            ->with('products',$products );
    }
}

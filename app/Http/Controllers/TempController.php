<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Category;
use App\CategoryType;
use App\SubCategory;
use App\Temp;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class TempController extends Controller
{
    public function index()
    {
        //$temp = Temp::all()->last();
        return view('tmp.index');
        // ->with('catalogs', $catalogs);
    }

    public function products()
    {
        $out = [];
        $catalogs = Catalog::all();
        foreach ($catalogs as $catalog) {

            $catalog_array = [];
            $catalog_array['catalog_id'] = $catalog->id;
            $catalog_array['catalog_name'] = $catalog->name;

            $categories = Category::where('catalog_id', '=', $catalog->id)->get();
            $ii = 0;
            foreach ($categories as $category) {
                $category_array = [];
                $category_array['category_id'] = $category->id;
                $category_array['category_name'] = $category->name;

                // To-Do
                if(($ii % 2) == 0){
                    $category_array['category_type'] = 'Switches';
                }else{
                    $category_array['category_type'] = 'Lights';
                }


                $subCategories = SubCategory::where('category_id', '=', $category->id)->get();
                foreach ($subCategories as $subCategory) {
                    $sub_category_array = [];
                    $sub_category_array['sub_category_id'] = $subCategory->id;
                    $sub_category_array['sub_category_name'] = $subCategory->name;
                    $sub_category_array['is_pack'] = $subCategory->is_pack;

                    //foreach
                    $products = DB::table('products')
                        ->join('sub_category_products', 'sub_category_products.product_id', '=', 'products.id')
                        ->join('sub_categories', 'sub_category_products.sub_category_id', '=', 'sub_categories.id')
                        ->join('product_symbols', 'products.symbol', '=', 'product_symbols.id')
                        ->select('products.*', 'product_symbols.path', 'product_symbols.name as symbol_name')
                        ->where('sub_categories.id', '=', $subCategory->id)
                        ->get();
                    foreach ($products as $product) {
                        //custom Fields
                        $custom_fields = DB::table('custom_data')
                            ->join('custom_field_sub_categories', 'custom_data.custom_field_sub_category_id', '=', 'custom_field_sub_categories.id')
                            ->select('custom_data.value', 'custom_field_sub_categories.name')
                            ->where('custom_data.product_id', '=', $product->id)
                            ->get();
                        $product_array = [];
                        $product_array['name'] = $product->name;
                        $product_array['description'] = $product->description;
                        $product_array['icon'] = $product->path;
                        $product_array['path'] = $product->image;
                        $product_array['productCode'] = $product->symbol_name;
                        foreach ($custom_fields as $key => $value) {
                            $product_array[$value->name] = $value->value;
                        }

                        $sub_category_array['data'][] = $product_array;
                    }

                    $category_array['data'][] = $sub_category_array;


                }
                $catalog_array['data'][] = $category_array;
            }
            $out[] = $catalog_array;
        }


        return $out;
        return '[
	{
		"catalog_id": 1,
		"catalog_name": "Electrical",
		"data": [
			{
				"catagory_id": 1,
				"category_name": "Lights",
				"data": [
					{
						"sub_catagory_id": 1,
						"sub_category_name": "LED",
						"data": [
							{
								"description": "Chandelier Lamp",
								"name": "product 1",
								"icon":"/img/symbols/AUT-039.png",
								"price": 200,
								"path": "/img/chandelier-lamp.png",
								"wattage": 100,
								"productCode": "PHL-001",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							},
							{
								"description": "Desk Lamp",
								"name": "product 2",
								"icon":"/img/symbols/HN-024.png",
								"price": 300,
								"path": "/img/deskLamp1.png",
								"wattage": 75,
								"productCode": "PHL-002",
								"catalogue": "Lights",
								"category": "Desk_Lamp"
							},
							{
								"description": "Hanging Linght",
								"name": "product 3",
								"icon":"/img/symbols/AUT-039.png",
								"price": 400,
								"path": "/img/hangingLight.png",
								"wattage": 150,
								"productCode": "PHL-003",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							}
						]
					},
					{
						"sub_catagory_id": 2,
						"sub_category_name": "Fluorescent",
						"data": [
							{
								"description": "Chandelier Lamp",
								"name": "product 4",
								"icon":"/img/symbols/AUT-039.png",
								"price": 200,
								"path": "/img/chandelier-lamp.png",
								"wattage": 100,
								"productCode": "PHL-001",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							},
							{
								"description": "Desk Lamp",
								"name": "product 5",
								"icon":"/img/symbols/HN-024.png",
								"price": 300,
								"path": "/img/deskLamp1.png",
								"wattage": 75,
								"productCode": "PHL-002",
								"catalogue": "Lights",
								"category": "Desk_Lamp"
							},
							{
								"description": "Hanging Linght",
								"name": "product 6",
								"icon":"/img/symbols/AUT-039.png",
								"price": 400,
								"path": "/img/hangingLight.png",
								"wattage": 150,
								"productCode": "PHL-003",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							}
						]
					}
				]
			},
			{
				"catagory_id": 2,
				"category_name": "Air conditioning",
				"data": [
					{
						"sub_catagory_id": 3,
						"sub_category_name": "Inverter",
						"data": [
							{
								"description": "Chandelier Lamp",
								"name": "product 7",
								"icon":"/img/symbols/AUT-039.png",
								"price": 200,
								"path": "/img/chandelier-lamp.png",
								"wattage": 100,
								"productCode": "PHL-001",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							},
							{
								"description": "Desk Lamp",
								"name": "product 8",
								"icon":"/img/symbols/AUT-039.png",
								"price": 300,
								"path": "/img/deskLamp1.png",
								"wattage": 75,
								"productCode": "PHL-002",
								"catalogue": "Lights",
								"category": "Desk_Lamp"
							},
							{
								"description": "Hanging Linght",
								"name": "product 9",
								"icon":"/img/symbols/AUT-039.png",
								"price": 400,
								"path": "/img/hangingLight.png",
								"wattage": 150,
								"productCode": "PHL-003",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							}
						]
					},
					{
						"sub_catagory_id": 4,
						"sub_category_name": "Non Inverter",
						"data": [
							{
								"description": "Chandelier Lamp",
								"name": "product 10",
								"icon":"/img/symbols/AUT-039.png",
								"price": 200,
								"path": "/img/chandelier-lamp.png",
								"wattage": 100,
								"productCode": "PHL-001",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							},
							{
								"description": "Desk Lamp",
								"name": "product 11",
								"icon":"/img/symbols/AUT-039.png",
								"price": 300,
								"path": "/img/deskLamp1.png",
								"wattage": 75,
								"productCode": "PHL-002",
								"catalogue": "Lights",
								"category": "Desk_Lamp"
							},
							{
								"description": "Hanging Linght",
								"name": "product 12",
								"icon":"/img/symbols/AUT-039.png",
								"price": 400,
								"path": "/img/hangingLight.png",
								"wattage": 150,
								"productCode": "PHL-003",
								"catalogue": "Lights",
								"category": "Hanging_Lights"
							}
						]
					}
				]
			}
		]
	}
]';
    }

    public function products1()
    {
        return '[{
"description": "Chandelier Lamp",
"name": "chandelier",
"price": 200,
"path": "img/chandelier-lamp.png",
"wattage": 100,
"productCode": "PHL-001",
"catalogue": "Lights",
"category": "Hanging_Lights"
},
  {
"description": "Desk Lamp",
"name": "deskLamp1",
"price": 300,
"path": "img/deskLamp1.png",
"wattage": 75,
"productCode": "PHL-002",
"catalogue": "Lights",
"category": "Desk_Lamp"
},
  {
"description": "Hanging Linght",
"name": "hangingLight",
"price": 400,
"path": "img/hangingLight.png",
"wattage": 150,
"productCode": "PHL-003",
"catalogue": "Lights",
"category": "Hanging_Lights"
},
  {
"description": "Light Switch",
"name": "Light Switch",
"price": 100,
"path": "img/lightSwitch.png",
"wattage": 0,
"productCode": "PHL-004",
"catalogue": "Switch",
"category": "Light_Switch"
},
  {
"description": "Prise Telephonique",
"name": "Prise Telephonique",
"price": 100,
"path": "img/priseTelephonique.png",
"wattage": 0,
"productCode": "PHL-005",
"catalogue": "Prise",
"category": "Prise_tele"
},
  {
"description": "Prise TV",
"name": "Price TV",
"price": 100,
"path": "img/priseTV.png",
"wattage": 0,
"productCode": "PHL-006",
"catalogue": "Prise",
"category": "Prise_TV"
}]';
    }

    public function save(Request $request)
    {
        $temp = new Temp();
        $temp->data = $request->get('file_data');
        $temp->save();
        return $temp->id;
    }

    public function load()
    {
        return DB::table('temps')->orderBy('id', 'desc')->first()->data;
    }

    public function loadOne($id)
    {
        return DB::table('temps')->where('id', '=', $id)->first()->data;
    }
}

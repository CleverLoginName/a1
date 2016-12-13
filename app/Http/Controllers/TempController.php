<?php

namespace App\Http\Controllers;

use App\Temp;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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

    public function save(Request $request){
        $temp = new Temp();
        $temp->data = $request->get('file_data');
        $temp->save();
    }
    public function load(){
        return DB::table('temps')->orderBy('id', 'desc')->first()->data;
    }
}

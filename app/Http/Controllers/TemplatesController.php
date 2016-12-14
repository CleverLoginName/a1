<?php

namespace App\Http\Controllers;

use App\Template;
use App\TemplatePlan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Szykra\Notifications\Flash;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
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
            'scale'    => 'required',
            'energy_rating'    => 'required',
            'house_watts_per_sqm'    => 'required',
            'garage_watts_per_sqm'    => 'required',
            'porch_watts_per_sqm'    => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return Redirect::to('/templates/create')
                ->withErrors($validator);

        $template = new Template();
        $template->name = $request->get('name');
        $template->scale = $request->get('scale');
        $template->energy_rating = $request->get('energy_rating');
        $template->sqm_house = $request->get('house_watts_per_sqm');
        $template->sqm_porch = $request->get('porch_watts_per_sqm');
        $template->sqm_garage = $request->get('garage_watts_per_sqm');
        $template->save();

        Flash::success('Template Added', 'Template has been added successfully.');
        session(['template' => $template]);
        session(['is_first' => true]);
        return Redirect::to('/templates/create/add-plans');

    }

    public function addPlan(Request $request){
        $templatesPlans = TemplatePlan::where('template_id','=',session('template')->id)->get();
        if(session('is_first')){
            session(['is_first' => false]);
            return  view('templates.addPlans')
                ->with('template',session('template'))
                ->with('templatesPlans',$templatesPlans)
                ->with('empty_form',false);
        }else{


            return  view('templates.addPlans')
                ->with('template',session('template'))
                ->with('templatesPlans',$templatesPlans)
                ->with('empty_form',true);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addTemplatePlansImage(Request $request)
    {//dd($request->all());
        $file = $request->file('file');
/*
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
*/
        $randFileName = Str::random(16).'.'.$file->getClientOriginalExtension();
        //Move Uploaded File
        $destinationPath = 'uploads/templates/'.$request->get('template_id').'/originals/';
        $destinationPathThumb = 'uploads/templates/'.$request->get('template_id').'/300x200/';//dd(public_path().'/'.$destinationPath);

        File::exists('uploads/templates/'.$request->get('template_id')) or File::makeDirectory('uploads/templates/'.$request->get('template_id'));
        File::exists(public_path().'/'.$destinationPath) or File::makeDirectory(public_path().'/'.$destinationPath);
        File::exists(public_path().'/'.$destinationPathThumb) or File::makeDirectory(public_path().'/'.$destinationPathThumb);


        $file->move($destinationPath,$randFileName);

        //if($request->get('save_plan')=='Y'){
            $templatePlan = new TemplatePlan();
            $templatePlan->design = '';
            $templatePlan->level = 1;
            $templatePlan->catalog_id =  1;
            $templatePlan->template_data =  0;
            $templatePlan->img = $destinationPath.$randFileName;
            $templatePlan->img_300x200 = $destinationPath.$randFileName;
            $templatePlan->template_id = session('template')->id;
            $templatePlan->save();
        //}

        $img = Image::make($templatePlan->img);
        $img->resize(300, 200);
        $img->save($destinationPathThumb.$randFileName, 75);
/*
        return  view('templates.addPlans')
            ->with('template',session('template'))
            ->with('empty_form',true);*/
        Flash::success('Image Added', 'Image has been added successfully.');
    }


    public function addTemplatePlansData(Request $request){
        $templatePlan = TemplatePlan::find($request->get('id'));
        $templatePlan->design = $request->get('design');
        $templatePlan->level = $request->get('level');
        $templatePlan->template_data =   0;
        $templatePlan->catalog_id = $request->get('catalog_id');
        $templatePlan->save();

        $templatesPlans = TemplatePlan::where('template_id','=',session('template')->id)->get();

        Flash::success('Data Added', 'Data has been added successfully.');
        return Redirect::to('/templates/create/add-plans');
        return  view('templates.addPlans')
            ->with('template',session('template'))
            ->with('templatesPlans',$templatesPlans)
            ->with('empty_form',false);

    }
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

    public function editPlanInCanvas($id)
    {
        $template = DB::table('template_plans')->where('id','=',$id)->first();
        $allPlans = DB::table('template_plans')->where('template_id','=',$template->template_id)->get();
        session(['template_id' => $template->id ]);
        session(['plan_id' => $id ]);
        return view('canvas.index_new')
            ->with('bgImg', $template->img)
            ->with('plans', $allPlans);
    }


    public function updatePlanDataInCanvas(Request $request)
    {

        $templatePlan = TemplatePlan::find(session('plan_id'));
        $templatePlan->template_data = $request->get('file_data') ;
        $templatePlan->save();
        //return view('canvas.index_new');

    }

    public function loadPlanDataInCanvas()
    {

        $templatePlan = TemplatePlan::find(session('plan_id'));
        return $templatePlan->template_data;
        //return view('canvas.index_new');

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
        //
    }
}

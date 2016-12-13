<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CanvasController extends Controller
{

    public function indexTemplate()
    {
        return view('canvas.index');
    }

    public function createTemplate()
    {
        //
    }


    public function storeTemplate(Request $request)
    {
        //
    }

    public function showTemplate($id)
    {
        //
    }

    public function editTemplate($id)
    {
        //
    }

    public function updateTemplate(Request $request, $id)
    {
        //
    }

    public function destroyTemplate($id)
    {
        //
    }
    public function indexPlan()
    {
        //
    }

    public function createPlan()
    {
        //
    }


    public function storePlan(Request $request)
    {
        //
    }

    public function showPlan($id)
    {
        //
    }

    public function editPlan($id)
    {
        //
    }

    public function updatePlan(Request $request, $id)
    {
        //
    }

    public function destroyPlan($id)
    {
        //
    }
}

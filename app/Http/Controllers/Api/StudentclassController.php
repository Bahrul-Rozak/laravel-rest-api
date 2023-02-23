<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Studentclass;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    public function Index()
    {
        $studentClass = Studentclass::latest()->get();
        return response()->json($studentClass);
    }

    // store have a request
    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:studentclasses|max:25'
        ]);

        Studentclass::insert([
            'class_name' => $request->class_name,
        ]);

        return response('Student Class Insert Succesfully!');
    }

    // edit by $id from api.php
    public function Edit($id)
    {
        $studentClass = Studentclass::findOrFail($id);
        return response()->json($studentClass);
    }

    public function Update(Request $request, $id)
    {
        Studentclass::findOrFail($id)->update([
            'class_name' => $request->class_name,
        ]);

        return response('Student Class Update Succesfully!');
    }

    public function Delete($id)
    {
        Studentclass::findOrFail($id)->delete();
        return response('Student Class Delete Succesfully!');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function Index()
    {
        $section = Section::latest()->get();
        return response()->json($section);
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            // sections nama tablenya
            'section_name' => 'required|unique:sections|max:25'
        ]);

        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now()
        ]);

        return response('Section Insert Succesfully!');
    }

    public function Edit($id)
    {
        $section = Section::findOrFail($id);
        return response()->json($section);
    }

    public function Update(Request $request, $id)
    {
        Section::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name
        ]);

        return response('Section Update Succesfully!');
    }

    public function Delete($id)
    {
        Section::findOrFail($id)->delete();
        return response('Section Delete Succesfully!');
    }
}

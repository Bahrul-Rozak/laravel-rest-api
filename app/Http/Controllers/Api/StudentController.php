<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function Index()
    {
        $student = Student::latest()->get();
        return response()->json($student);
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            // students nama tablenya
            'name' => 'required|unique:students|max:25',
            'email' => 'required|unique:students|max:25'
        ]);

        Student::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // photo jangan lupa buat folder untuk tampung foto di public, dan letakkan dummy foto disana untuk uji :v
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now(),
        ]);

        return response('Student Insert Succesfully!');
    }

    public function Edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function Update(Request $request, $id)
    {
        Student::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // photo jangan lupa buat folder untuk tampung foto di public, dan letakkan dummy foto disana untuk uji :v
            'photo' => $request->photo,
            'gender' => $request->gender,
        ]);

        return response('Student Update Succesfully!');
    }

    public function Delete($id)
    {
        Student::findOrFail($id)->delete();
        return response('Student Delete Succesfully!');
    }
}

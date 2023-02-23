<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Studentclass;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    public function index()
    {
        $class = Studentclass::latest()->get();
        return response()->json($class);
    }
}

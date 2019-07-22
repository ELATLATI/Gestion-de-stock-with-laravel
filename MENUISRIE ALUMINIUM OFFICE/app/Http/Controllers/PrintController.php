<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Devi;
class PrintController extends Controller
{
      public function index()
      {
            $students = Devi::all();
            return view('printstudent')->with('students', $students);;
      }
      public function prnpriview()
      {
            $students =Devi ::all();
            return view('admin.Devis.devi')->with('students', $students);;
      }
}

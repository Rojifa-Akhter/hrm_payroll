<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halfleaves;
use App\Models\employees;
use App\Models\designations;
use App\Models\departments;

use DB;

class attendanceReport extends Controller
{

    public function index(Request $request)
    {    
        return view('attendances.report.report_list');
    }
   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halfleaves;
use App\Models\employees;
use App\Models\designations;
use App\Models\departments;

use DB;

class employeeReportList extends Controller
{

    public function index(Request $request)
    {    
        return view('employees.report.report_list');
    }
   

}

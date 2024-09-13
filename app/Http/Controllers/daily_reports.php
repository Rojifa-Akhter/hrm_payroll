<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\confirmattendances;
use DB;

class daily_reports extends Controller
{
    //
    public function index(Request $request){
        
        
        $employee = $request ->input('employee_id');
        $date=$request ->input('date');
        

        $joined_data = DB::table('attendances')
        ->leftJoin('employees', 'attendances.employeeId', '=', 'employees.id')
        ->leftJoin('designations', 'employees.designation', '=', 'designations.id')
        ->select('attendances.*', 'employees.name', 'designations.desig_name');

        if (!empty($employee)) {
            $joined_data->where('attendances.employeeId',$employee);
        }

        if (!empty($date)) {
            $joined_data->where('attendances.date',$date);
        }

        $joined_data = $joined_data->get();
        $employees = employees::get();

        return view('attendances.report.daily_reports_list',compact('joined_data','employees','employee','date'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movementregisters;
use App\Models\movementregisterdeatials;
use App\Models\employees;
use DB;

class short_move_reports extends Controller
{
    
    public function index(Request $request){
       

        $employee = $request ->input('employee_id');
        //$date=$request ->input('date');
        $fromDate =$request->input('fromDate');
        $toDate = $request->input('toDate');
        
        $joined_data = DB::table('shortmovementregisters')
        ->leftJoin('employees', 'shortmovementregisters.emId', '=', 'employees.id')
        ->leftJoin('designations', 'employees.designation', '=', 'designations.id')
        ->select('shortmovementregisters.*', 'employees.name','employees.employeeId', 'designations.desig_name');

        if (!empty($employee)) {
            $joined_data->where('shortmovementregisters.emId',$employee);
        }

        if (!empty($fromDate)) {
            $joined_data->where('shortmovementregisters.date','>=',$fromDate);
        }

        if (!empty($toDate)) {
            $joined_data->where('shortmovementregisters.date','<=',$toDate);
        }

        $joined_data = $joined_data->get();
        $employees = employees::get();

        return view('attendances.report.short_move_list',compact('joined_data','employees','employee','fromDate','toDate'));
    }
}

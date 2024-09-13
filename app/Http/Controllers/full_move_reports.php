<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movementregisters;
use App\Models\movementregisterdeatials;
use App\Models\employees;
use DB;


class full_move_reports extends Controller
{
    
    public function index(Request $request){
        

        $employee = $request ->input('employee_id');
        $date=$request ->input('date');
        $from_date = $request -> input('fromDate');
        $to_date = $request -> input('toDate');
        
       

        $joined_data = DB::table('movementregisters')
        ->leftJoin('employees', 'movementregisters.employeeId', '=', 'employees.id')
        ->leftJoin('designations', 'employees.designation', '=', 'designations.id')
        ->select('movementregisters.*', 'employees.name','employees.employeeId', 'designations.desig_name');

    if (!empty($employee)) {
        $joined_data->where('movementregisters.employeeId',$employee);
    }

    if (!empty($from_date)) {
        $joined_data->where('movementregisters.fromDate','>=',$from_date);
    }

    if (!empty($to_date)) {
        $joined_data->where('movementregisters.toDate','<=',$to_date);
    }

    

        $joined_data = $joined_data->get();
        $employees = employees::get();

        return view('attendances.report.full_move_list',compact('joined_data','employees','employee','date','from_date','to_date'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halfleaves;
use App\Models\employees;
use DB;

class halfLeave extends Controller
{
    //
    public function index()
    {    
        // $tbl_employee=employees::get();
        $tbl_halfleaves=halfleaves::leftJoin('employees', 'halfleaves.employeeId' ,'=' , 'employees.id')
        ->select('halfleaves.*', 'employees.name')->get();

        return view('leaves.half_leave.halfleave_list',compact('tbl_halfleaves'));
    }

    public function add_halfLeave()
    {    
        $employeeInfo = employees::get();
        return view('leaves.half_leave.add',compact('employeeInfo'));
    }

    public function store(Request $request)
    {  
        $data=array();  
        
        // $data['id'] = $request['id'];
        $data['employeeId'] = $request['employeeId'];
        $data['date'] = $request['date'];
        $data['startTime'] = $request['date'] . ' ' . $request['startTime'];
        $data['endTime'] = $request['date'] . ' ' . $request['endTime'];
        $data['reason'] = $request['reason'];
        $data['status'] = "Pending";
        // $data['approver_name'] = $request['approverName'];
        // $data['approver_id'] = $request['approverID'];



        halfleaves::insert($data);
        return redirect()->route('halfLeave_list');
        
    }

    public function edit_halfLeave(Request $request, $id)
    {    
        $employee_Info = employees::get();
        $halfLeave_info= halfleaves::findOrFail($id);
        return view('leaves.half_leave.edit',compact('halfLeave_info','employee_Info'));
    }

    public function update(Request $request )
    {  
        $id=$request->id;
        $halfLeave_info = halfleaves::findOrFail($id);
      
        // echo '<pre>';
        // print_r($halfLeave_info);
        // exit;
        // $halfLeave_info->id = $request->id;
        $halfLeave_info->employeeId = $request->employeeId;
        $halfLeave_info->date = $request->date;
        $halfLeave_info->startTime =  $request->date . ' ' . $request->startTime;
        $halfLeave_info->endTime = $request->date . ' ' . $request->endTime; 
        $halfLeave_info->reason = $request->reason;
        

        $halfLeave_info->save();   
       
        return redirect()->route('halfLeave_list');
        
    }


    public function view_halfLeave(Request $request, $id)
    {    
        $halfLeave_info= halfleaves::findOrFail($id);    
        return view('leaves.half_leave.view',compact('halfLeave_info'));
    }


    public function destroy($id)
    {
        halfleaves::destroy($id);
        return redirect()->route('halfLeave_list');
    }
}

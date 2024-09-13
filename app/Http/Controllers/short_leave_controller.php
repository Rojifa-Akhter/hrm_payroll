<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shortleave;
use App\Models\employees;

class short_leave_controller extends Controller
{
    public function index()
    {
           // $tbl_employee=employees::get();
           $tbl_leave=shortleave::leftJoin('employees', 'shortleaves.employeeId' ,'=' , 'employees.id')
           ->select('shortleaves.*', 'employees.name')->get();
   
           return view('leaves.shortLeave.short_leave_list',compact('tbl_leave'));
   
    }

    
    public function create()
    {
        $tbl_emp = employees::get();        
        return view('leaves.shortLeave.add', compact('tbl_emp'));

    }

    
    public function store(Request $request)
    {

        $data=array();      
        $data['employeeId'] = $request['employeeId'];
        $data['date'] = $request['date'];
        $data['startTime'] = $request['date'] . ' '.$request['startTime'];

        $data['endTime'] = $request['date'] . ' '.$request['endTime'];
        $data['reason'] = $request['reason'];
          
        shortleave::insert($data);
        return redirect()->route('shortleave_list');
        //return back();
        
    }

    
    public function show($id)
    {
        $leave_info= shortleave::findOrFail($id);    
        return view('leaves.shortLeave.view',compact('leave_info'));
    }

    public function edit($id)
    {
        $leave_info= shortleave::findOrFail($id);
        $employee_Info = employees::get();
        return view('leaves.shortLeave.edit',compact('leave_info','employee_Info'));
    }

   
    public function update(Request $request)
    {
        $id=$request->id;
        $leave = shortleave::findOrFail($id);
        
        
      
        $leave->employeeId = $request->employeeId;
        $leave->date = $request->date;
        $leave->startTime = $request['date'] . ' '.$request['startTime'];
        $leave->endTime = $request['date'] . ' '.$request['endTime'];
        $leave->reason = $request->reason;
       
       
        
        
        $leave->save();   
        return redirect()->route('shortleave_list');
    }

    
    public function destroy($id)
    {
        shortleave::destroy($id);
        return redirect()->route('shortleave_list');
    }
}

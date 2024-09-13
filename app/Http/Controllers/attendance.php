<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendances;
use App\Models\employees;
use DB;
class attendance extends Controller
{
    public function index(){
        //$attendances = attendances::get();

        $attendances=DB::table('attendances')
            ->leftJoin('employees', 'attendances.employeeId', '=', 'employees.id')// joining the contacts table , where user_id and contact_user_id are same
            ->select('attendances.*', 'employees.name')
            ->get();
        // print_r($attendances);  
        // exit;  
        return view('settings.attendances.attendances_list',compact('attendances'));
    }

    public function add_attendance(){
        $employees = employees::get();
        return view('settings.attendances.add',compact('employees'));
    }

    // public function store(Request $request){
    //     $data = array();

    //     foreach($employee as){
    //         // $data = array();
    //     $data['employeeId']=$request['employee_id'];
    //     $data['date']=$request['date'];
    //     $data['timeIn']=$request['date'].' '.$request['timeIn'];
    //     $data['timeOut']=$request['date'].' '.$request['timeOut'];
    //     $data['overTime']=$request['overtime'];
    //     $data['remarks']=$request['remarks'];

    //     attendances::insert($data[]);
    //     }
    //     return redirect()->route('attendances_list');
    // }
    
    //$data['overTime'] =$data['timeOut']- $data['timeIn'];



    public function store(Request $request)
    {
        
        $employeeIds = $request->input('employee_id');
        $dates = $request->input('date');
        $timeIns = $request->input('timeIn');
        $timeOuts = $request->input('timeOut');
       
        $remarks = $request->input('remarks');

        $status = $request->input('status');
    
        
    
        foreach ($employeeIds as $index => $employeeId) {

            

            $data = array();
            // $data[] = [
            //     'employeeId' => $employeeId,
            //     'date' => $dates[$index],
            //     'timeIn' => $dates[$index] . ' ' . $timeIns[$index],
            //     'timeOut' => $dates[$index] . ' ' . $timeOuts[$index],
            //     'overTime' => $overTimes[$index],
            //     'remarks' => $remarks[$index],
            // ];

            $data['employeeId'] =$employeeId;
            $data['date'] =$dates[$index];
            $data['timeIn'] =$dates[$index] . ' ' . $timeIns[$index];
            $data['timeOut'] =$dates[$index] . ' ' . $timeOuts[$index];
            $data['status'] =$status[$index];
            
            attendances::insert($data);
        }

       // attendances::insert($data);
    
       
    
        return redirect()->route('attendances_list');
    }



    
    public function edit_attendance(Request $request, $id)
    {    
        $sections_info= attendances::findOrFail($id);
        $departments=employees::get();
        return view('settings.attendances.edit',compact('sections_info','departments'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $sections = attendances::findOrFail($id);
        // print_r($sections);
        // exit;
        
        $sections->employeeId = $request->employee_id;
        $sections->date = $request->date;
        $sections->timeIn =$request->date.' '.$request->timeIn;
        $sections->timeOut =$request->date.' '.$request->timeOut;
        $sections->status = $request->status;
        $sections->remarks = $request->remarks;

        $sections->save();   
        return redirect()->route('attendances_list');
        
    }

    public function view_attendance(Request $request, $id)
    {    
        $sections_info= attendances::findOrFail($id);    
        return view('settings.attendances.view',compact('sections_info'));
    }

    public function destroy($id)
    {
        attendances::destroy($id);
        return redirect()->route('attendances_list');
    }
}

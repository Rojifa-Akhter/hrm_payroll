<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\confirmattendances;
use App\Models\employees;
use DB;

class confirmattendance extends Controller
{
    //
    public function index(){
        $joined_data=DB::table('confirmattendances')
            ->leftJoin('employees', 'confirmattendances.emId', '=', 'employees.id')// joining the contacts table , where user_id and contact_user_id are same
            ->select('confirmattendances.*', 'employees.name')
            ->get();
            return view('settings.confirmattendances.confirmattendances_list',compact('joined_data')); 
    }

    public function add_confirmattendance(){
        $employees = employees::get();
        return view('settings.confirmattendances.add',compact('employees'));
    }




    
    public function store(Request $request)
    {
        // print_r($request->all());
        // exit;

        //$officeTime = strtotime($request->input('timeOut'))-strtotime($request->input('timeIn'));
       
        $employeeIds = $request->input('employee_id');
        $month = $request ->input('month');
        $work_days = $request->input('working_days');
        $present_days = $request->input('present_days');
        $absent_days = $request->input('absent_days');
        //$overTimes = 8 - $officeTime;
        $payable_days = $request->input('payable_days');
    
        
    
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

            $data['emId'] =$employeeId;
            $data['month'] =$month;
            $data['working_days'] =$work_days[$index];
            $data['present_days'] =$present_days[$index];
            $data['absent_days'] =$absent_days[$index];
            $data['payable_days'] =$payable_days[$index];
           

            confirmattendances::insert($data);

        }

       // attendances::insert($data);
    
       
    
        return redirect()->route('confirmattendances_list');
    }



    public function edit_confirmattendance(Request $request, $id)
    {    
        $sections_info= confirmattendances::findOrFail($id);
        $departments=employees::get();
        return view('settings.confirmattendances.edit',compact('sections_info','departments'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $sections = confirmattendances::findOrFail($id);
        // print_r($sections);
        // exit;
        
        $sections->emId = $request->employee_id;
        $sections->month = $request->month;
        $sections->working_days =$request->working_days;
        $sections->present_days =$request->present_days;
        $sections->absent_days = $request->absent_days;
        $sections->payable_days = $request->payable_days;

        $sections->save();   
        return redirect()->route('confirmattendances_list');
        
    }

    public function view_attendance(Request $request, $id)
    {    
        $sections_info= confirmattendances::findOrFail($id);    
        return view('settings.attendances.view',compact('sections_info'));
    }

    public function destroy($id)
    {
        confirmattendances::destroy($id);
        return redirect()->route('confirmattendances_list');
    }
}





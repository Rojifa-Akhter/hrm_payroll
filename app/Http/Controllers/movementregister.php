<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movementregisters;
use App\Models\employees;
use DB;

class movementregister extends Controller
{
    public function index(){
        // $attendances = movementregisters::get();

        $attendances=DB::table('movementregisters')
            ->leftJoin('employees', 'movementregisters.employeeId', '=', 'employees.id')
            ->select('movementregisters.*', 'employees.name')
            ->get();
        // // print_r($attendances);  
        // // exit;  
        return view('settings.movementregister.movementregister_list',compact('attendances'));
    }

    public function add_movementregister(){
        $employees = employees::get();
        return view('settings.movementregister.add',compact('employees'));
    }

    public function store(Request $request){
        $data = array();

        $data['employeeId']=$request['employee_id'];
        //$data['date']=$request['date'];
        $data['address']=$request['location'];
        $data['fromDate']=$request['fromDate'];
        $data['toDate']=$request['toDate'];
        $data['reason']=$request['reason'];
        $data['task_status']=$request['task_status'];
        

        movementregisters::insert($data);
        return redirect()->route('movementregister_list');
    }
    public function edit_movementregister(Request $request, $id)
    {    
        
        $sections_info= movementregisters::findOrFail($id);
        $departments=employees::get();
        return view('settings.movementregister.edit',compact('sections_info','departments'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $sections = movementregisters::findOrFail($id);
        // print_r($sections);
        // exit;
        
        $sections->employeeId = $request->employee_id;
       // $sections->date = $request->date;
        $sections->address = $request->location;
        $sections->fromDate = $request->fromDate;
        $sections->toDate = $request->toDate;
        $sections->reason = $request->reason;
        $sections->task_status = $request->task_status;

        $sections->save();   
        return redirect()->route('movementregister_list');
        
    }

    public function view_movementregister(Request $request, $id)
    {    
        $sections_info= movementregisters::findOrFail($id);  
        $departments=employees::get();  
        return view('settings.movementregister.view',compact('sections_info','departments'));
    }

    public function destroy($id)
    {
        movementregisters::destroy($id);
        return redirect()->route('movementregister_list');
    }
}

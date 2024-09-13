<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shortmovementregisters;
use App\Models\employees;
use DB;
class shortmovementregister extends Controller
{
    public function index(){
        // $attendances = shortmovementregisters::get();

        $attendances=DB::table('shortmovementregisters')
            ->leftJoin('employees', 'shortmovementregisters.emId', '=', 'employees.id')
            ->select('shortmovementregisters.*', 'employees.name')
            ->get();
        // // print_r($attendances);  
        // // exit;  
        return view('settings.shortmovementregister.shortmovementregister_list',compact('attendances'));
    }

    public function add_shortmovementregister(){
        $employees = employees::get();
        return view('settings.shortmovementregister.add',compact('employees'));
    }

    public function store(Request $request){
        $data = array();
        // echo $request['employee_id'];
        // exit;
        $data['emId']=$request['employee_id'];
        $data['date']=$request['date'];
        $data['startTime']=$request['date'] . ' ' . $request['startTime'];
        $data['endTime']=$request['date'] . ' ' . $request['endTime'];
        $data['reason']=$request['reason'];

        shortmovementregisters::insert($data);
        return redirect()->route('shortmovementregister_list');
    }
    public function edit_shortmovementregister(Request $request, $id)
    {    
        $sections_info= shortmovementregisters::findOrFail($id);
        $departments=employees::get();
        return view('settings.shortmovementregister.edit',compact('sections_info','departments'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $sections = shortmovementregisters::findOrFail($id);
        // print_r($sections);
        // exit;
        
        $sections->emId = $request->employee_id;
        $sections->date = $request->date;
        $sections->startTime = $request->date . ' ' . $request->startTime;
        $sections->endTime = $request->date . ' ' . $request->endTime;
        $sections->reason = $request->reason;

        $sections->save();   
        return redirect()->route('shortmovementregister_list');
        
    }

    public function view_shortmovementregister(Request $request, $id)
    {    
        
        $sections_info= shortmovementregisters::findOrFail($id);    
        $departments=employees::get();  
        return view('settings.shortmovementregister.view',compact('sections_info','departments'));
    }

    public function destroy($id)
    {
        shortmovementregisters::destroy($id);
        return redirect()->route('shortmovementregister_list');
    }
}

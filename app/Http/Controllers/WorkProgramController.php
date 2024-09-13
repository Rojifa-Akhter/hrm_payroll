<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\employees;
use App\Models\t;
use Illuminate\Http\Request;
use App\Models\Workprogram;
use DB;

class WorkProgramController extends Controller
{
    public function index()
    {
        $workProgramInfos=Workprogram::get();
        return view('employees.workprograms.work_program_list',compact('workProgramInfos'));
    }

    public function addProgramWork()
    {
        $companies=companies::get();
        $employees  = employees::get();

        return view('employees.workprograms.add',compact('companies','employees'));
    }

    public function store(Request $request)
    {
        $data=array();
        $data['date'] = $request['date'];
        $data['deadline'] = $request['deadline'];
        $data['concern_type'] = $request['concern_type'];
        $data['employee_id'] = $request['employee_id'];
        $data['job'] = $request['job'];
        $data['organization'] = $request['organization'];
        $data['concern_type'] = $request['concern_type'];
        $data['others'] = $request['others'];
        $data['concern_employee'] = $request['concern_employee'];
        $data['status'] ="Pending";
        Workprogram::insert($data);
        return redirect()->route('work_program_list')->with('message','Work program Added');
        //return back();
    }

    public function EditWorkProgram(Request $request, $id)
    {
        $workProgramInfo= Workprogram::findOrFail($id);
        return view('employees.workprograms.edit',compact('workProgramInfo'));
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $workProgramInfo = Workprogram::findOrFail($id);
        $workProgramInfo->date = $request->date;
        $workProgramInfo->deadline = $request->deadline;
        $workProgramInfo->concern_type = $request->concern_type;
        $workProgramInfo->save();
        return redirect()->route('work_program_list')->with('message','Work program updated');

    }


    public function view_work_programs(Request $request, $id)
    {
        $workProgramInfo= Workprogram::findOrFail($id);
        return view('employees.workprograms.view',compact('workProgramInfo'));
    }
//

    public function deleteWorkProgram($id)
    {
        Workprogram::destroy($id);
        return redirect()->route('work_program_list')->with('message','Work program deleted');
    }
    public function done(Request $request, $id){
        $workProgramInfo= Workprogram::findOrFail($id);
        $workProgramInfo->status = "Done";
        $workProgramInfo->save();
        return redirect()->route('work_program_list')->with('message','Done');
    }
    public function Undone(Request $request, $id){
        $workProgramInfo= Workprogram::findOrFail($id);
        $workProgramInfo->status = "Pending";
        $workProgramInfo->save();
        return redirect()->route('work_program_list')->with('message','Undone');
    }
}

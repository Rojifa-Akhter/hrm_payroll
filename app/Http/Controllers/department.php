<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departments;
use DB;

class department extends Controller
{
    public function index()
    {    
        $departments=departments::get();
        return view('settings.department.department_list',compact('departments'));
    }

    public function add_department()
    {    
        return view('settings.department.add');
    }

    public function store(Request $request)
    {  
        $data=array();  
        $data['dept_name'] = $request['name'];
        $data['dep_description'] = $request['description'];
        $data['dept_short_name'] = $request['sname'];

        departments::insert($data);
        return redirect()->route('department_list');
        
    }

    public function edit_department(Request $request, $id)
    {    
        $department_info= departments::findOrFail($id);
        return view('settings.department.edit',compact('department_info'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $department_info = departments::findOrFail($id);
        
        
        $department_info->dept_name = $request->name;
        $department_info->dep_description = $request->description;
        $department_info->dept_short_name = $request->sname;
        

        $department_info->save();   
        return redirect()->route('department_list');
        
    }

        
    

    public function view_department(Request $request, $id)
    {    
        $departments_info= departments::findOrFail($id);    
        return view('settings.department.view',compact('departments_info'));
    }


    public function destroy($id)
    {
        departments::destroy($id);
        return redirect()->route('department_list');
    }

}

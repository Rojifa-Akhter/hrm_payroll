<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sections;
use App\Models\departments;
use DB;

class section extends Controller
{
    public function index()
    {    
        $sections=sections::get();
       
        return view('settings.sections.sections_list',compact('sections'));
    }

    public function add_section()
    {    
        $departments=departments::get();
        return view('settings.sections.add',compact('departments'));
    }

    public function store(Request $request)
    {  
        $data=array();  
        $data['section_name'] = $request['section_name'];
        $data['department'] = $request['department_id'];
        $data['description'] = $request['description'];
        
        sections::insert($data);
        return redirect()->route('sections_list');
        //return back();
    }

    public function edit_section(Request $request, $id)
    {    
        $sections_info= sections::findOrFail($id);
        $departments=departments::get();
        return view('settings.sections.edit',compact('sections_info','departments'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $sections = sections::findOrFail($id);
        // print_r($sections);
        // exit;
        
        $sections->section_name = $request->section_name;
        $sections->department = $request->department_id;
        $sections->description = $request->description;

        $sections->save();   
        return redirect()->route('sections_list');
        
    }


    public function view_section(Request $request, $id)
    {    
        $sections_info= sections::findOrFail($id);    
        return view('settings.sections.view',compact('sections_info'));
    }


    public function destroy($id)
    {
        sections::destroy($id);
        return redirect()->route('sections_list');
    }

}

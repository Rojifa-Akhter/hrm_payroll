<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subsections;
use App\Models\sections;

use DB;

class subsection extends Controller
{
    //
    public function index()
    {    
        $subsectioninfo=subsections::get();
        return view('settings.subsection.subsection_list',compact('subsectioninfo'));
    }

    public function add_subsection()
    {   $sectioninfo = sections::get();
        return view('settings.subsection.add',compact('sectioninfo'));
    }

    public function store(Request $request)
    {  
        $data=array();  
        $data['name'] = $request['name'];
        $data['section'] = $request['section'];
        
        $data['description'] = $request['description'];

        subsections::insert($data);
        return redirect()->route('subsection_list');
        
    }

    public function edit_subsection(Request $request, $id)
    {    
        $sectioninfo = sections::get();
        $subsectioninfo= subsections::findOrFail($id);
        return view('settings.subsection.edit',compact('sectioninfo','subsectioninfo'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $subsectioninfo = subsections::findOrFail($id);
        
        
        $subsectioninfo->section = $request->section;
        $subsectioninfo->name = $request->name;
        $subsectioninfo->description = $request->description;
       
        

        $subsectioninfo->save();   
        return redirect()->route('subsection_list');
        
    }

        
    

    public function view_subsection(Request $request, $id)
    {    
        $subsectioninfo= subsections::findOrFail($id);    
        return view('settings.subsection.view',compact('subsectioninfo'));
    }


    public function destroy($id)
    {
        subsections::destroy($id);
        return redirect()->route('subsection_list');
    }

}

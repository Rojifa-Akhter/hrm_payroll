<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\leavetypes;
use DB;

class leavetype extends Controller
{
    public function index()
    {    
        $tbl_leavetype=leavetypes::get();
        return view('settings.leavetype.leavetype_list',compact('tbl_leavetype'));
    }

    public function add_leavetype()
    {    
        return view('settings.leavetype.add');
    }

    public function store(Request $request)
    {  
        $data=array();  
        $data['name'] = $request['name'];
        $data['short_name'] = $request['sname'];
        $data['description'] = $request['description'];
        $data['allowedLeave'] = $request['allow'];
        leavetypes::insert($data);
        return redirect()->route('leavetype_list');
        
    }

    public function edit_leavetype(Request $request, $id)
    {    
        $leavetype_info= leavetypes::findOrFail($id);
        return view('settings.leavetype.edit',compact('leavetype_info'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $leavetype_info = leavetypes::findOrFail($id);
      
        
        $leavetype_info->name = $request->name;
        $leavetype_info->short_name = $request->sname;
        $leavetype_info->description = $request->description;
        $leavetype_info->allowedLeave = $request->allow;
        $leavetype_info->save();   
        return redirect()->route('leavetype_list');
        
    }


    public function view_leavetype(Request $request, $id)
    {    
        $leavetype_info= leavetypes::findOrFail($id);    
        return view('settings.leavetype.view',compact('leavetype_info'));
    }


    public function destroy($id)
    {
        leavetypes::destroy($id);
        return redirect()->route('leavetype_list');
    }

}

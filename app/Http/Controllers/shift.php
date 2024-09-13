<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shifts;
use DB;

class shift extends Controller
{

    public function index()
    {    
        $shifts=shifts::get();
        return view('settings.shifts.shift_list',compact('shifts'));
    }

    public function add_shift()
    {    
        return view('settings.shifts.add');
    }

    public function store(Request $request)
    {
        $data=array();
        $data['shift'] = $request['shift'];
        $data['shiftCode'] = $request['shiftCode'];
        $data['startTime'] = $request['stime'];
        $data['endTime'] = $request['etime'];
        shifts::insert($data);
        return redirect()->route('shift_list')->with('message','Shift Added successfully');
    
    }

    public function edit_shift(Request $request, $id)
    {    
        $shift_info= shifts::findOrFail($id);
        return view('settings.shifts.edit',compact('shift_info'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $shift_info = shifts::findOrFail($id);
        
        
        $shift_info->shift = $request->shift;
        $shift_info->shiftCode = $request->shiftCode;
        $shift_info->startTime = $request->stime;
        $shift_info->endTime = $request->etime;

        
        $shift_info->save();   
        return redirect()->route('shift_list');
        
    }

        
    

    public function view_shift(Request $request, $id)
    {    
        $shift_info= shifts::findOrFail($id);    
        return view('settings.shifts.view',compact('shift_info'));
    }


    public function destroy($id)
    {
        shifts::destroy($id);
        return redirect()->route('shift_list');
    }

}



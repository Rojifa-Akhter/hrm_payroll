<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banks;
use DB;

class bank extends Controller
{
    public function index()
    {    
        $banks=banks::get();
        return view('settings.banks.bank_list',compact('banks'));
    }

    public function add_bank()
    {    
        return view('settings.banks.add');
    }

    public function store(Request $request)
    {  
        $data=array();  
        $data['name'] = $request['name'];
        $data['company_account'] = $request['company'];
        $data['branch_name'] = $request['brname'];
        $data['bank_type'] = $request['btype'];
        $data['routing_number'] = $request['rnumber'];
        banks::insert($data);
        return redirect()->route('bank_list');
        //return back();
    }

    public function edit_bank(Request $request, $id)
    {    
        $bank_info= banks::findOrFail($id);
        return view('settings.banks.edit',compact('bank_info'));
    }

    public function update(Request $request)
    {  
        $id=$request->id;
        $bank = banks::findOrFail($id);
  
        $bank->name = $request->name;
        $bank->company_account = $request->company;
        $bank->branch_name = $request->brname;
        $bank->bank_type = $request->btype;
        $bank->routing_number = $request->rnumber;
        

        $bank->save();   
        return redirect()->route('bank_list');
        
    }


    public function view_bank(Request $request, $id)
    {    
        $bank_info= banks::findOrFail($id);    
        return view('settings.banks.view',compact('bank_info'));
    }


    public function destroy($id)
    {
        banks::destroy($id);
        return redirect()->route('bank_list');
    }

}

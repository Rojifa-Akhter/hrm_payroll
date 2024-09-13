<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\increments;
use DB;

class increment extends Controller
{
    //
    public function index()
    {    
        // $tbl_employee=employees::get();
        $tbl_increments=increments::leftJoin('employees', 'increments.emId' ,'=' , 'employees.id')                              
        ->select('increments.*', 'employees.name', 'employees.employeeId')->get();
        return view('payroll.increment.increment_list',compact('tbl_increments'));
    }

    public function add_increment()
    {    
        $employeeInfo = employees::get();
        $incrementsInfo = increments::get();
        return view('payroll.increment.add',compact('employeeInfo','incrementsInfo'));
    }

    public function store(Request $request)
    {  
        $data=array();  

        $data['emId'] = $request['employeeId'];
        $data['adjust_month'] = $request['adjustMonth'];
        $data['increment_date'] = $request['incrementDate'];
        $data['effective_date'] = $request['effectiveDate'];
        $data['effective_month'] = $request['effectiveMonth'];
        $data['gross'] = $request['grossIncrement'];
        $data['Others'] = $request['otherAllowance'];
        $data['net_gross'] = $request['NetgrossIncrement'];
        $data['salary_increment_amount'] = $request['salaryIncrement'];
        $data['others_increment_amount'] = $request['otherIncrement'];
        $data['total_increment_amount'] = $request['NetgrossIncrement'] + $request['grossIncrement'] + $request['salaryIncrement'] + $request['otherIncrement'];
        $data['type'] = $request['distribution'];
        $data['bank_amount'] = $request['bank'];
        $data['cash_amount'] = $request['cash'];



        increments::insert($data);
        return redirect()->route('increment_list');
        
    }

    public function edit_increment(Request $request, $id)
    {    
        $employee_Info = employees::get();
        $increments_info= increments::findOrFail($id);
        $tbl_increments=increments::leftJoin('employees', 'increments.emId' ,'=' , 'employees.id')
                                  
        ->select('increments.*', 'employees.name', 'employees.employeeId')->get();

        return view('payroll.increment.edit',compact('increments_info','employee_Info','tbl_increments'));
    }



    public function update(Request $request )
    {  
        $id=$request->id;
        $increments_info = increments::findOrFail($id);
      
       
        $increments_info->emId = $request->employeeId;
        $increments_info->adjust_month = $request->adjustMonth;
        $increments_info->increment_date =  $request->incrementDate;
        $increments_info->effective_date = $request->effectiveDate; 
        $increments_info->effective_month = $request->effectiveMonth;
        $increments_info->gross = $request->grossIncrement;
        $increments_info->Others = $request->otherAllowance;
        $increments_info->net_gross = $request->NetgrossIncrement;
        $increments_info->salary_increment_amount = $request->salaryIncrement;
        $increments_info->others_increment_amount = $request->otherIncrement;
        $increments_info->total_increment_amount = $request->grossIncrement + $request->NetgrossIncrement +  $request->salaryIncrement + $request->otherIncrement;
        $increments_info->type = $request->distribution;
        $increments_info->bank_amount = $request->bank;
        $increments_info->cash_amount = $request->cash;

        $increments_info->save();   
       
        return redirect()->route('increment_list');
        
    }


    public function view_increment(Request $request, $id)
    {    
      
        $employee_Info = employees::get();
        $increments_info= increments::findOrFail($id);
        $tbl_increments=increments::join('employees', 'increments.emId' ,'=' , 'employees.employeeId')
                                  
        ->select('increments.*', 'employees.name', 'employees.employeeId')->get();

        return view('payroll.increment.view',compact('increments_info','employee_Info','tbl_increments'));
    }


    public function destroy($id)
    {
        increments::destroy($id);
        return redirect()->route('increment_list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\employees;
use App\Models\designations;
use App\Models\departments;


use DB;

class terminatedEmployeeReport extends Controller
{
    public function index(Request $request)
    {

        $employeeId = $request->input('emId');
        $designationId = $request->input('designationId');
        $departmentId = $request->input('departmentId');
        $startdate = $request->input('startDate');
        $enddate = $request->input('endDate');
        

       $employee_info = employees::all();
       $designation_info = designations::all();
       $department_info = departments::all();

       $table_employees =employees::leftJoin('departments', 'employees.department', '=', 'departments.id')
            ->leftJoin('designations', 'employees.designation', '=', 'designations.id')
            ->select('employees.*','departments.dept_short_name','designations.desig_name')
            ->where('employees.is_active', '=', '0');
            

         // Apply filters based on search parameters
         if (!empty($employeeId)) {
            $table_employees->where('employees.employeeId', $employeeId);
        }

        if (!empty($designationId)) {
            $table_employees->where('employees.designation', $designationId);
        }

        if (!empty($departmentId)) {
            $table_employees->where('employees.department', $departmentId);
        }

        if (!empty($startdate) && !empty($enddate)) {
            // Assuming 'startDateLeave' and 'endDateLeave' are the columns for leave dates in the 'leaves' table
            $table_employees->whereDate('employees.resign_date', '>=', $startdate)
                ->whereDate('employees.resign_date', '<=', $enddate);
        }

       
         $table_employees=$table_employees->get();    
        
        
        return view('employees.report.terminatedreport_list', compact('table_employees','employee_info', 'designation_info', 'department_info', 'enddate','startdate','departmentId','designationId','employeeId'));
    }

   


}


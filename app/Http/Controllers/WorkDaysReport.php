<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\employees;
use App\Models\designations;
use App\Models\departments;



use DB;

class WorkDaysReport extends Controller
{
    public function index(Request $request)
    {
        // $request->employeeId;
        $employeeId = $request->input('emId');
        $designationId = $request->input('designationId');
        $departmentId = $request->input('departmentId');
        $startdate = $request->input('startDate');
        $enddate = $request->input('endDate');
        $Range = $request->input('range');
        $TotalYear = $request->input('totalYear');
        

       $employee_info = employees::all();
       $designation_info = designations::all();
       $department_info = departments::all();



       $table_employees =employees::leftJoin('departments', 'employees.department', '=', 'departments.id')
            ->leftJoin('designations', 'employees.designation', '=', 'designations.id')
            ->select('employees.*','departments.dept_short_name','designations.desig_name');
            

         // Apply filters based on search parameters
         if (!empty($employeeId)) {
            $table_employees->where('employees.id',$employeeId);
        }

        if (!empty($designationId)) {
            $table_employees->where('employees.designation', $designationId);
        }

        if (!empty($departmentId)) {
            $table_employees->where('employees.department', $departmentId);
        }

        if (!empty($startdate) && !empty($enddate)) {

            $table_employees->whereDate('employees.joinDate', '>=', $startdate)
                ->whereDate('employees.joinDate', '<=', $enddate);
        }
        

        if (!empty($Range) && !empty($TotalYear)) {
            $todayDate = date('Y-m-d');
            if ($Range === 'bellow') {
                $table_employees->where(DB::raw("DATEDIFF('$todayDate', employees.joinDate) / 365"), '<', $TotalYear);
            } elseif ($Range === 'above') {
                $table_employees->where(DB::raw("DATEDIFF('$todayDate', employees.joinDate) / 365"), '>', $TotalYear);  
            }
        }

       
         $table_employees=$table_employees->get();   
        
         $years = range(1, 20);

            
        return view('employees.report.WorkingDays_report_list', compact('table_employees','employee_info', 'designation_info', 'department_info', 'enddate','startdate','departmentId','designationId','employeeId', 'years', 'Range', 'TotalYear'));
    }

}

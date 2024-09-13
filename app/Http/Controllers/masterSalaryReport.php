<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\designations;
use App\Models\departments;
use App\Models\employeesalaries;
use App\Models\confirmattendances;
use App\Models\salaryarrears;
use App\Models\absentpayments;
use App\Models\genaratedsalaries;



use DB;

class masterSalaryReport extends Controller
{
    public function index(Request $request)
    {
        
        $employeeId = $request->input('emId');
        $designationId = $request->input('designationId');
        $departmentId = $request->input('departmentId');
        $month = $request->input('month');
        if(empty($month)){
            $month=date('Y-m');
        }
        


       
       $designation_info = designations::all();
       $department_info = departments::all();
       
            
            $employee_info = employees::query(); // Start the base query

                if (!empty($employeeId)) {
                    $employee_info->where('employees.id', $employeeId);
                }

                if (!empty($departmentId)) {
                    $employee_info->where('employees.department', $departmentId);
                }

                if (!empty($designationId)) {
                    $employee_info->where('employees.designation', $designationId);
                }

                if (!empty($startdate) && !empty($enddate)) {
                    $employee_info->whereDate('employees.joinDate', '>=', $startdate)
                        ->whereDate('employees.joinDate', '<=', $enddate);
                }

                $employee_info = $employee_info->get(); // Execute the query and get the results


        $all_employee_info =  employees::all();

 
       foreach ($employee_info as $key => $com) {

        $table_salaries = employeesalaries::where('employeesalaries.employeeId', $com->id)->get();
        $employee_info[$key]['salary_info']=$table_salaries;

        $table_attendence = confirmattendances::where('confirmattendances.emId', $com->id)
                            // ->where('confirmattendances.')
                            ->get();
        $employee_info[$key]['attendance_info']=$table_attendence;

        $table_salaryarrears = salaryarrears::where('salaryarrears.emId', $com->id)->get();
        $employee_info[$key]['salaryarrears_info']=$table_salaryarrears;

        $table_absentpayments = absentpayments::where('absentpayments.emId', $com->id)->get();
        $employee_info[$key]['absentpayments_info']=$table_absentpayments;

        $table_department = departments::where('departments.id', $com->department)->get();
        $employee_info[$key]['department_info']=$table_department;

        $table_designation = designations::where('designations.id', $com->designation)->get();
        $employee_info[$key]['designation_info']=$table_designation;

    }

    return view('payroll.report.master_salary_report',compact('employee_info','designation_info','department_info','month','departmentId','designationId','employeeId', 'all_employee_info'));

    }
}

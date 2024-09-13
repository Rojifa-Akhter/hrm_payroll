<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/', 'home@index')->name('dashboard');
Route::get('/employee','employee@index')->name('employee_list');


//Employee Modules Start

Route::group(['prefix' => 'employee'], function () {
    Route::get('/','Employee@index')->name('employees');
    Route::get('/add', 'Employee@create')->name('employee.create');

    Route::post('/service', 'Employee@store')->name('employee.store.service');
    Route::get('/edit_service/{id}', 'Employee@edit')->name('employee.edit.service');
    Route::get('/view_service/{id}', 'Employee@view')->name('employee.view.service');
    Route::post('/update_service', 'Employee@update')->name('employee.update.service');
   // Route::get('/service_delete/{id}', 'Employee@destroy')->name('service_delete');

    Route::get('/create_personal/{id}', 'Employee@create_personal')->name('create.personal');
    Route::get('/personal/{id}', 'Employee@edit_personal')->name('employee.edit.personal');
    Route::post('/update.personal', 'Employee@update_personal')->name('update.personal');

    Route::get('/create_contact/{id}', 'Employee@crate_contact')->name('create.contact');
    Route::post('/update_contact', 'Employee@update_contact')->name('update.contact');

    Route::get('/list_academic/{id}', 'Employee@academic')->name('list.academic');
    Route::post('/store_academic', 'Employee@store_academic')->name('employee.store.academic');
    Route::post('/academic_info', 'Employee@academic_info')->name('info.academic');
    Route::post('/update_academic', 'Employee@update_academic')->name('employee.update.academic');
    Route::get('/academic_delete/{id}', 'Employee@destroy')->name('employee.academic.delete');

    Route::get('/list_materials/{id}', 'Employee@materials')->name('list.materials');
    Route::post('/materials', 'Employee@store_materials')->name('employee.store.materials');
    Route::post('/materials_info', 'Employee@materials_info')->name('materials.info');
    Route::post('/update_materials', 'Employee@update_materials')->name('update.materials');
    Route::get('/materials_delete/{id}', 'Employee@destroy')->name('materials.delete');

    Route::get('/list_performance/{id}', 'Employee@performance')->name('list.performance');
    Route::post('/performances', 'Employee@store_performances')->name('store.performances');
    Route::post('/performances_info', 'Employee@performances_info')->name('performances.info');
    Route::post('/update_performances', 'Employee@update_performances')->name('update.performances');
    Route::get('/performance_delete/{id}', 'Employee@destroy')->name('performance_delete');

    Route::get('/list_transfer/{id}', 'Employee@transfer')->name('list.transfer');
    Route::post('/ttrList', 'Employee@store_ttrLists')->name('store.ttrLists');
    Route::post('/transfer_info', 'Employee@transfers_info')->name('transfers.info');
    Route::post('/update_transfers', 'Employee@update_transfers')->name('update.transfers');
    Route::get('/ttrList_delete/{id}', 'Employee@destroy')->name('ttrList_delete');

    Route::get('/list_disipline/{id}', 'Employee@disipline')->name('list.disipline');
    Route::post('/disipline', 'Employee@store_disipline')->name('store.disipline');
    Route::post('/disiplines_info', 'Employee@disiplines_info')->name('disiplines.info');
    Route::post('/update_disiplines', 'Employee@update_disiplines')->name('update.disiplines');
    Route::get('/disipline_delete/{id}', 'Employee@destroy')->name('employee.disipline.delete');

    Route::get('/list_resigned/{id}', 'Employee@resigned')->name('list.resigned');
    Route::post('/resigned', 'Employee@store_resigned')->name('store.resigned');
    Route::post('/resigneds_info', 'Employee@resigneds_info')->name('resigneds.info');
    Route::post('/update_resigneds', 'Employee@update_resigneds')->name('update.resigneds');
    Route::get('/resigned_delete/{id}', 'Employee@destroy')->name('resigned_delete');

    

    // Route::get('/add/step/{step?}', 'Employee@create')->name('employee.create.step');
    // Route::get('/add/{employee?}/step/{step?}', 'Employee@create')->name('employee.create.nextstep'); 
    // Route::post('/store/step/{step?}', 'Employee@store')->name('employee.store');
    // Route::post('/store/{employee?}/step/{step?}', 'Employee@store')->name('employee.store.nextstep');
    
    // Route::get('/edit/{id}', 'employee@edit')->name('employee.edit');
    
    
    Route::post('/getSection', 'Employee@getSection')->name('employee.subsection');
    Route::get('/view/{id}', 'Employee@view')->name('employee.view');
    Route::get('/destroy/{id}', 'Employee@destroy')->name('employee.destroy');
   
    
});


Route::get('/rejected_emplyee','employee@rejectedEmplyee')->name('rejected_list');
Route::get('/resigned_employee','employee@resingedEmplyee')->name('resigned_list');

Route::get('/activated_rejected_employee/{id}','employee@ActivatedRejectedEmployee')->name('activate_rejected');
Route::get('/activated_employee/{id}','employee@ActivatedResignedEmployee')->name('activate_resigned');


//Route for work programs


Route::get('/work_programs','WorkProgramController@index')->name('work_program_list');

Route::get('/work_program_add', 'WorkProgramController@addProgramWork')->name('work_program_add');
Route::post('/work_program_add_section', 'WorkProgramController@store')->name('work_program_add_section');
Route::get('/edit_work_program/{id}', 'WorkProgramController@EditWorkProgram')->name('edit_work_program');
Route::get('/view_work_programs/{id}', 'WorkProgramController@view_work_programs')->name('view_work_programs');
Route::post('/update_work_program', 'WorkProgramController@update')->name('update_work_program');
Route::get('/work_program_delete/{id}', 'WorkProgramController@deleteWorkProgram')->name('work_program_delete');

//Route for work program done or undone
Route::get('/done/{id}', 'WorkProgramController@done')->name('done');
Route::get('/undone/{id}', 'WorkProgramController@Undone')->name('undone');






//employeeReport_list

Route::any('/employee_report_list','employeeReportList@index')->name('employee_report_list');

Route::any('/employeeReport_list','employeeReport@index')->name('employeeReport_list');
Route::any('/ActiveemployeeReport_list','activeEmployeeReport@index')->name('active_employee_report');
Route::any('/TerminatedemployeeReport_list','terminatedEmployeeReport@index')->name('terminated_employee_report');
Route::any('/TotalWorkingDaysReport_list','WorkDaysReport@index')->name('service_length_report');
Route::any('/IncrementReport_list','incrementReport@index')->name('employee_increment_report');


//Employee Modules End




//Leave Modules Start


//shortleave route
Route::get('/shortleave','short_leave_controller@index')->name('shortleave_list');
//add
Route::post('/add_shortleave_action', 'short_leave_controller@store')->name('shortleave_add_action');
Route::get('/add_shortleave', 'short_leave_controller@create')->name('shortleave_add');
Route::get('/view_shortleave/{id}', 'short_leave_controller@show')->name('view_shortleave');
Route::get('/edit_shortleave/{id}', 'short_leave_controller@edit')->name('edit_shortleave');
Route::get('/delete_shortleave/{id}', 'short_leave_controller@destroy')->name('delete_shortleave');
Route::post('/update_shortleave', 'short_leave_controller@update')->name('update_shortleave');




//halfLeave_list halfLeave_delete view_halfLeave halfLeave_add halfLeave_add_action edit_halfLeave update_halfLeave
Route::get('/half_leave','halfLeave@index')->name('halfLeave_list');
Route::get('/halfLeave_delete/{id}', 'halfLeave@destroy')->name('halfLeave_delete');
Route::get('/view_halfLeave/{id}', 'halfLeave@view_halfLeave')->name('view_halfLeave');
Route::get('/add_halfLeave', 'halfLeave@add_halfLeave')->name('halfLeave_add');
Route::post('/add_section_halfLeave', 'halfLeave@store')->name('halfLeave_add_action');
Route::get('/edit_halfLeave/{id}', 'halfLeave@edit_halfLeave')->name('edit_halfLeave');
Route::post('/update_halfLeave', 'halfLeave@update')->name('update_halfLeave');


// Full Leaves
Route::get('/full_leave','full_leaves@index')->name('full_leave_list');
Route::get('/add_full_leave', 'full_leaves@add_full_leave')->name('full_leave_add');
Route::post('/add_full_leave_action', 'full_leaves@store')->name('full_leave_add_action');
Route::get('/edit_full_leave/{id}', 'full_leaves@edit_full_leave')->name('edit_full_leave');
Route::get('/view_full_leave/{id}', 'full_leaves@view_full_leave')->name('view_full_leave');
Route::post('/update_full_leave', 'full_leaves@update')->name('update_full_leave');
Route::get('/full_leave_delete/{id}', 'full_leaves@destroy')->name('full_leave_delete');

Route::post('/total_leave_working_days', 'full_leaves@total_leave_working_days')->name('total_leave_working_days');
Route::get('/holiday-count/{from}/{to}/{emId}', 'full_leaves@holidayCount')->name('holidayCount');


//Leave Types-> Leave Report 

Route::any('/leave_report_list','leaveReport@index')->name('leave_report_list');

Route::any('/daily_leave_report_list','daily_leave_report@index')->name('daily_leave_report_list');
Route::get('/searchLeaves', 'daily_leave_report@search')->name('searchLeaves');

Route::any('/daily_half_leave_report_list','daily_half_leave_report@index')->name('daily_half_leave_report_list');
Route::any('/daily_short_leave_report_list','daily_short_leave_report@index')->name('daily_short_leave_report_list');




//Leave Modules End




//Attendance Module Start


Route::get('/attendance','attendance@index')->name('attendances_list');
Route::get('/add_attendance', 'attendance@add_attendance')->name('attendance_add');
Route::post('/add_attendance_action', 'attendance@store')->name('attendance_add_action');
Route::get('/edit_attendance/{id}', 'attendance@edit_attendance')->name('edit_attendance');
Route::get('/view_attendance/{id}', 'attendance@view_attendance')->name('view_attendance');
Route::post('/update_attendance', 'attendance@update')->name('update_attendance');
Route::get('/attendance_delete/{id}', 'attendance@destroy')->name('attendance_delete');



Route::get('/confirmattendance','confirmattendance@index')->name('confirmattendances_list');
Route::get('/add_confirmattendance', 'confirmattendance@add_confirmattendance')->name('confirmattendance_add');
Route::post('/add_confirmattendance_action', 'confirmattendance@store')->name('confirmattendance_add_action');
Route::get('/edit_confirmattendance/{id}', 'confirmattendance@edit_confirmattendance')->name('edit_confirmattendance');
Route::get('/view_confirmattendance/{id}', 'confirmattendance@view_confirmattendance')->name('view_confirmattendance');
Route::post('/update_confirmattendance', 'confirmattendance@update')->name('update_confirmattendance');
Route::get('/confirmattendance_delete/{id}', 'confirmattendance@destroy')->name('confirmattendance_delete');


Route::get('/shortmovementregister','shortmovementregister@index')->name('shortmovementregister_list');
Route::get('/add_shortmovementregister', 'shortmovementregister@add_shortmovementregister')->name('shortmovementregister_add');
Route::post('/add_shortmovementregister_action', 'shortmovementregister@store')->name('shortmovementregister_add_action');
Route::get('/edit_shortmovementregister/{id}', 'shortmovementregister@edit_shortmovementregister')->name('edit_shortmovementregister');
Route::get('/view_shortmovementregister/{id}', 'shortmovementregister@view_shortmovementregister')->name('view_shortmovementregister');
Route::post('/update_shortmovementregister', 'shortmovementregister@update')->name('update_shortmovementregister');
Route::get('/shortmovementregister_delete/{id}', 'shortmovementregister@destroy')->name('shortmovementregister_delete');

Route::get('/movementregister','movementregister@index')->name('movementregister_list');
Route::get('/add_movementregister', 'movementregister@add_movementregister')->name('movementregister_add');
Route::post('/add_movementregister_action', 'movementregister@store')->name('movementregister_add_action');
Route::get('/edit_movementregister/{id}', 'movementregister@edit_movementregister')->name('edit_movementregister');
Route::get('/view_movementregister/{id}', 'movementregister@view_movementregister')->name('view_movementregister');
Route::post('/update_movementregister', 'movementregister@update')->name('update_movementregister');
Route::get('/movementregister_delete/{id}', 'movementregister@destroy')->name('movementregister_delete');

//Attendance Report
Route::any('/attendance_report_list','attendanceReport@index')->name('attendance_report_list');
Route::get('/daily_reports','daily_reports@index')->name('daily_attendance_report');
Route::get('/short_move_reports','short_move_reports@index')->name('short_move_list');
Route::get('/full_move_reports','full_move_reports@index')->name('full_move_list');


//Attendance Module End



//Payroll Modules Start



// HRM-PAYROLL->Salary
Route::get('/salary','salary@index')->name('salary_list');
Route::get('/add_salary', 'salary@add_salary')->name('salary_add');
Route::post('/add_salary_action', 'salary@store')->name('salary_add_action');
Route::get('/edit_salary/{id}', 'salary@edit_salary')->name('edit_salary');
Route::get('/view_salary/{id}', 'salary@view_salary')->name('view_salary');
Route::post('/update_salary', 'salary@update')->name('update_salary');
Route::get('/salary_delete/{id}', 'salary@destroy')->name('salary_delete');

// HRM-PAYROLL->Salary_Arrear
Route::get('/salary_arrear','salary_arrear@index')->name('salary_arrear_list');
Route::get('/add_salary_arrear', 'salary_arrear@add_salary_arrear')->name('salary_arrear_add');
Route::post('/add_salary_arrear_action', 'salary_arrear@store')->name('salary_arrear_add_action');
Route::get('/edit_salary_arrear/{id}', 'salary_arrear@edit_salary_arrear')->name('edit_salary_arrear');
Route::get('/view_salary_arrear/{id}', 'salary_arrear@view_salary_arrear')->name('view_salary_arrear');
Route::post('/update_salary_arrear', 'salary_arrear@update')->name('update_salary_arrear');
Route::get('/salary_arrear_delete/{id}', 'salary_arrear@destroy')->name('salary_arrear_delete');


// HRM-PAYROLL->absent_payments
Route::get('/absent_payments','absent_payments@index')->name('absent_payments_list');
Route::get('/add_absent_payments', 'absent_payments@add_absent_payments')->name('absent_payments_add');
Route::post('/add_absent_payments_action', 'absent_payments@store')->name('absent_payments_add_action');
Route::get('/edit_absent_payments/{id}', 'absent_payments@edit_absent_payments')->name('edit_absent_payments');
Route::get('/view_absent_payments/{id}', 'absent_payments@view_absent_payments')->name('view_absent_payments');
Route::post('/update_absent_payments', 'absent_payments@update')->name('update_absent_payments');
Route::get('/absent_payments_delete/{id}', 'absent_payments@destroy')->name('absent_payments_delete');



//increment_list increment_delete view_increment increment_add increment_add_action edit_increment update_increment
Route::get('/increment','increment@index')->name('increment_list');
Route::get('/increment_delete/{id}', 'increment@destroy')->name('increment_delete');
Route::get('/view_increment/{id}', 'increment@view_increment')->name('view_increment');
Route::get('/increment_add', 'increment@add_increment')->name('increment_add');
Route::post('/add_increment', 'increment@store')->name('increment_add_action');
Route::get('/edit_increment/{id}', 'increment@edit_increment')->name('edit_increment');
Route::post('/update_increment', 'increment@update')->name('update_increment');

//Payroll Report
Route::any('/payroll_report_list','payrollReport@index')->name('payroll_report_list');
Route::any('/masterSalaryReport_list','masterSalaryReport@index')->name('masterSalaryReport_list');

//Payroll Modules End



//Setting Modules Start

//Company

Route::get('/company','company@index')->name('company_list');
Route::get('/add_company', 'company@add_company')->name('company_add');
Route::post('/add_company_action', 'company@store')->name('company_add_action');
Route::get('/edit_company/{id}', 'company@edit_company')->name('edit_company');
Route::get('/view_company/{id}', 'company@view_company')->name('view_company');
Route::post('/update_company', 'company@update')->name('update_company');
Route::get('/company_delete/{id}', 'company@destroy')->name('company_delete');

//designation
Route::get('/designation','designation@index')->name('designation_list');
Route::get('/add_designation', 'designation@add_designation')->name('designation_add');
Route::post('/add_designation_action', 'designation@store')->name('designation_add_action');
Route::get('/view_designation/{id}', 'designation@view_designation')->name('view_designation');
Route::get('/edit_designation/{id}', 'designation@edit_designation')->name('edit_designation');
Route::post('/update_designation', 'designation@update')->name('update_designation');
Route::get('/designation_delete/{id}', 'designation@destroy')->name('designation_delete');

//department
Route::get('/department','department@index')->name('department_list');
Route::get('/add_department', 'department@add_department')->name('department_add');
Route::post('/add_department_action', 'department@store')->name('department_add_action');
Route::get('/edit_department/{id}', 'department@edit_department')->name('edit_department');
Route::post('/update_department', 'department@update')->name('update_department');
Route::get('/view_department/{id}', 'department@view_department')->name('view_department');
Route::get('/department_delete/{id}', 'department@destroy')->name('department_delete');

//bank
Route::get('/bank','bank@index')->name('bank_list');
Route::get('/bank_delete/{id}', 'bank@destroy')->name('bank_delete');
Route::get('/add_bank', 'bank@add_bank')->name('bank_add');
Route::post('/add_bank_action', 'bank@store')->name('bank_add_action');
Route::get('/view_bank/{id}', 'bank@view_bank')->name('view_bank');
Route::get('/edit_bank/{id}', 'bank@edit_bank')->name('edit_bank');
Route::post('/update_bank', 'bank@update')->name('update_bank');

//shift
Route::get('/shift','shift@index')->name('shift_list');
Route::get('/shift_delete/{id}', 'shift@destroy')->name('shift_delete');
Route::get('/add_shift', 'shift@add_shift')->name('shift_add');
Route::post('/add_section_shift', 'shift@store')->name('shift_add_section');
Route::get('/view_shift/{id}', 'shift@view_shift')->name('view_shift');
Route::get('/edit_shift/{id}', 'shift@edit_shift')->name('edit_shift');
Route::post('/update_shift', 'shift@update')->name('update_shift');

//leavetype
Route::get('/leave type','leavetype@index')->name('leavetype_list');
Route::get('/leave_delete/{id}', 'leavetype@destroy')->name('leave_delete');
Route::get('/add_leavetype', 'leavetype@add_leavetype')->name('leavetype_add');
Route::post('/add_section_leavetype', 'leavetype@store')->name('leavetype_add_action');
Route::get('/view_leavetype/{id}', 'leavetype@view_leavetype')->name('view_leavetype');
Route::get('/edit_leavetype/{id}', 'leavetype@edit_leavetype')->name('edit_leavetype');
Route::post('/update_leavetype', 'leavetype@update')->name('update_leavetype');

//Section

Route::get('/section','section@index')->name('sections_list');
Route::get('/add_section', 'section@add_section')->name('section_add');
Route::post('/add_section_action', 'section@store')->name('section_add_action');
Route::get('/edit_section/{id}', 'section@edit_section')->name('edit_section');
Route::get('/view_section/{id}', 'section@view_section')->name('view_section');
Route::post('/update_section', 'section@update')->name('update_section');
Route::get('/section_delete/{id}', 'section@destroy')->name('section_delete');


//subsection_list subsection_delete view_subsection subsection_add subsection_add_action edit_subsection update_subsection
Route::get('/subsection','subsection@index')->name('subsection_list');
Route::get('/subsection_delete/{id}', 'subsection@destroy')->name('subsection_delete');
Route::get('/view_subsection/{id}', 'subsection@view_subsection')->name('view_subsection');
Route::get('/add_subsection', 'subsection@add_subsection')->name('subsection_add');
Route::post('/add_subsection', 'subsection@store')->name('subsection_add_action');
Route::get('/edit_subsection/{id}', 'subsection@edit_subsection')->name('edit_subsection');
Route::post('/update_subsection', 'subsection@update')->name('update_subsection');



//Setting Modules End







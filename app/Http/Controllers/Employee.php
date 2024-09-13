<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\academicinfos;
use App\Models\employeematerials;
use App\Models\performances;
use App\Models\transferemloyees;
use App\Models\disciplines;
use App\Models\designations;
use App\Models\companies;
use App\Models\departments;
use App\Models\shifts;
use App\Models\sections;
use DB;




class Employee extends Controller
{
    public function index()
    {
        $employees = employees::leftJoin('designations', 'employees.designation', '=', 'designations.id')
            ->leftJoin('departments', 'employees.department', '=', 'departments.id')
            ->leftJoin('companies', 'employees.company', '=', 'companies.id')
            ->select('employees.*', 'designations.desig_name', 'departments.dept_name', 'companies.name as compani')
            ->get();
        return view('employees.employee_list', compact('employees'));
    }



    public function getSection(Request $request)
    {
        $sec_id = $request->sec_id;
        $data['subsection'] = DB::table('subsections')->where('section', $sec_id)->get();
        echo json_encode($data);
    }

    public function create(Request $request)
    {
        $step = $request->step;
        $id = $request->employee;
        $designation_info = DB::table('designations')->select('designations.*')->get();
        $company_info = DB::table('companies')->select('companies.*')->get();
        $department_info = DB::table('departments')->select('departments.*')->get();
        $section_info = DB::table('sections')->select('sections.*')->get();
        $subsection_info = DB::table('subsections')->select('subsections.*')->get();
        $shift_info = DB::table('shifts')->select('shifts.*')->get();

        return view('employees.service.service_info', compact('step', 'id', 'designation_info', 'company_info', 'department_info', 'section_info', 'subsection_info', 'shift_info'));
    }
    public function create_personal(Request $request, $id)
    {
        $employee = employees::findOrFail($id);
        return view('employees.personal.personal_info', compact('employee', 'id'));
    }

    public function store(Request $request)
    {
        $employee = $request->id;
        $validatedData = $request->validate([
            'company' => 'required|max:55',
            'designation' => 'required',
            'department' => 'required',
            'employee_id' => 'required',
            // 'resume' => 'required|pdf|max:2048',
        ]);

        $employee = new employees;
        $employee->company = $validatedData['company'];
        $employee->salary_unit = $request['salary'];
        $employee->department = $validatedData['department'];
        $employee->employeeId = $validatedData['employee_id'];
        $employee->section = $request['section'];
        $employee->sub_section = $request['sub_section'];
        $employee->designation = $validatedData['designation'];
        $employee->e_category = $request['category'];
        $employee->workerType = $request['worker_type'];
        $employee->shift = $request['Shift'];
        $employee->joinDate = $request['join_date'];
        $employee->activationDate = $request['activation_date'];

        

        if(!empty($request->file('resume'))){
            $imagePath = $request->file('resume')->store('assets/dist/img');
            $employee->resume = $imagePath;
        }

        $employee->weekend = $request['weekend'];
        $employee->confirmation = $request['confirmation'];
        $employee->tin_no = $request['tin'];
        $employee->pabx = $request['pabx'];
        $employee->serialNo = $request['punch_id'];
        $employee->one_punch = $request['one_punch'];
        $employee->save();

        $notification = array('messege' => 'employee Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('create.personal', $employee->id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    


    public function edit_personal(Request $request, $id)
    {
        $employee = employees::findOrFail($id);
        return view('employees.personal.personal_info', compact('employee'));
    }



    public function edit(Request $request, $id)
    {
        $step = 1;
        // $id = $id;
        $designation_info = DB::table('designations')->select('designations.*')->get();
        $company_info = DB::table('companies')->select('companies.*')->get();
        $department_info = DB::table('departments')->select('departments.*')->get();
        $section_info = DB::table('sections')->select('sections.*')->get();
        $subsection_info = DB::table('subsections')->select('subsections.*')->get();
        $shift_info = DB::table('shifts')->select('shifts.*')->get();
        $employee_info = employees::findOrFail($id);
        // $emplyee = DB::table('employees')->select('employees.*')->get();
        // return view('employees.edit',compact('employee_info','step','id'));
        return view('employees.service.edit_service', compact('employee_info', 'designation_info', 'company_info', 'department_info', 'section_info', 'subsection_info', 'shift_info', 'step', 'id'));
    }

    public function update(Request $request)
    {


        $id = $request->id;
        //dd($id);

        $employee = employees::findOrFail($id);

        $employee->company = $request['company'];
        $employee->salary_unit = $request['salary'];
        $employee->department = $request['department'];
        $employee->employeeId = $request['employee_id'];
        $employee->section = $request['section'];
        $employee->sub_section = $request['sub_section'];
        $employee->designation = $request['designation'];
        $employee->e_category = $request['category'];
        $employee->workerType = $request['worker_type'];
        $employee->shift = $request['Shift'];
        $employee->joinDate = $request['join_date'];
        $employee->activationDate = $request['activation_date'];

        if(!empty($request->file('resume'))){
            $imagePath = $request->file('resume')->store('assets/dist/img');
            $employee->resume = $imagePath;
        }
        $employee->weekend = $request['weekend'];
        $employee->confirmation = $request['confirmation'];
        $employee->tin_no = $request['tin'];
        $employee->pabx = $request['pabx'];
        $employee->serialNo = $request['punch_id'];
        $employee->one_punch = $request['one_punch'];
        $employee->save();
        $notification = array('messege' => 'Service Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('create.personal', $id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function update_personal(Request $request)
    {
        $id = $request->id;
        $employee = employees::findOrFail($id);
        $employee->name = $request->full_name;
        $employee->fatherName = $request->father_name;
        $employee->motherName = $request->mother_name;
        $employee->dob = $request->birth_date;
        $employee->bloodGroup = $request->bloodgroup;
        $employee->gender = $request->gender;
        $employee->maritial_status = $request->maritalSt;
        $employee->presentAddress = $request->present_add;
        $employee->permanentAddress = $request->permanent_add;

        if(!empty($request->file('em_photo'))){
            $imagePath = $request->file('em_photo')->store('assets/dist/img');
            $employee->photo = $imagePath;
        }
        $employee->voterId = $request->niId;
        if(!empty($request->file('ni_image'))){
            $imagePath = $request->file('ni_image')->store('assets/dist/img');
            $employee->voterImage = $imagePath;
        }
        $employee->nationality = $request->nationality;
        $employee->religion = $request->religion;
        $employee->save();
        $notification = array('messege' => 'personal Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('create.contact', $id)->with($notification);
        } else {

            return "Unit was not Created";
        }
    }
    public function crate_contact(Request $request, $id)
    {
        $employee = employees::findOrFail($id);
        return view('employees.contact.contact_info', compact('employee', 'id'));
    }

    public function update_contact(Request $request)
    {
        $id = $request->id;
        $employee = employees::findOrFail($id);
        $employee->office_phone = $request->office_phone;
        $employee->office_tnt1 = $request->Office_tnt;
        $employee->office_tnt2 = $request->Office2_tnt;
        $employee->phone = $request->personal_Phone;
        $employee->home_phone = $request->home_phone;
        $employee->save();

        $notification = array('messege' => 'contact Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.academic', $id)->with($notification);
        } else {

            return "Unit was not Created";
        }
    }


    public function resigned(Request $request, $id)
    {
         $employee = employees::findOrFail($id);
        return view('employees.resigned.resigned_info', compact('id', 'employee'));
    }
    

    public function update_resigneds(Request $request){
        $id = $request->id;
        $employee = employees::findOrFail($id);
        $employee->status = $request->resignedType;
        $employee->resign_date = $request->res_date;
        $employee->reason = $request->resi_reason;
        $employee->save();

        $notification = array('messege' => 'resigneds Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.resigned', $id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }



    public function academic(Request $request, $id)
    {
        $academic_info = academicinfos::Join('employees', 'employees.id', '=', 'academicinfos.employeeId'  )
        ->where('academicinfos.employeeId',$id)
        ->select('academicinfos.*','employees.id as emId')
        ->get();
        return view('employees.academic.academic_info', compact('id','academic_info'));
    }
    public function store_academic(Request $request)
    {
        $id = $request->id;
        $employee = new academicinfos();
        $employee->employeeId = $request->id;
        $employee->exam_title = $request->exam_title;
        $employee->institute = $request->institute;
        $employee->result = $request->result;
        $employee->passing_year = $request->passing_year;
        $employee->save();
        $notification = array('messege' => 'academic Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.academic', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }
    public function academic_info(Request $request)
    {
        $acad_id = $request->acad_id;
        $data['academic_info'] = DB::table('academicinfos')
        ->select('academicinfos.*')
        ->where('id', $acad_id)
        ->get();
        echo json_encode($data);
    }
    
    public function update_academic(Request $request)
    {
        $id = $request->id;
        $employee = academicinfos::findOrFail($id);
        $employee->exam_title = $request->exam_title;
        $employee->institute = $request->institute;
        $employee->result = $request->result;
        $employee->passing_year = $request->passing_year;
        $employee->save();
        $notification = array('messege' => 'Academic Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.academic', $employee->employeeId)->with($notification);
        } else {

            return "Unit was not Created";
        }  
    }
    public function destroy_academic($id)
    {
        academicinfos::destroy($id);
        return back();
    }

    public function materials(Request $request, $id)
    {

        // $employee = employees::findOrFail($id);
        $materials_info = employeematerials::Join('employees', 'employees.id', '=', 'employeematerials.employeeId')
        ->where('employeematerials.employeeId',$id)
        ->select('employeematerials.*','employees.id as maId')
        ->get();
        return view('employees.materials.materials_info', compact('id','materials_info'));
    }

    public function store_materials(Request $request)
    {
         $id = $request->id;
        $employee = new employeematerials();
        $employee->employeeId = $request->id;
        $employee->	material_name = $request->materials;
        $employee->qty = $request->qty;
        $employee->issueDate = $request->issue_date;
        $employee->warranty = $request->warranty;
        $employee->	price = $request->price;
        $employee->description = $request->description;
        $employee->save();

        $notification = array('messege' => 'materials Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.materials', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }
    public function materials_info(Request $request)
    {
        $mate_id = $request->mate_id;
        $data['material_info'] = DB::table('employeematerials')
        ->select('employeematerials.*')
        ->where('id', $mate_id)
        ->get();
        echo json_encode($data);
    }
    public function update_materials(Request $request){

        $id = $request->id;
        $employee = employeematerials::findOrFail($id);
        $employee->	material_name = $request->materials;
        $employee->qty = $request->qty;
        $employee->issueDate = $request->issue_date;
        $employee->warranty = $request->warranty;
        $employee->	price = $request->price;
        $employee->description = $request->description;
        $employee->save();

        $notification = array('messege' => 'materials Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.materials', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function destroy_materials($id)
    {
        employeematerials::destroy($id);
        return back();
    }

    public function performance(Request $request, $id)
    {
        $performances_info = performances::Join('employees', 'employees.id', '=', 'performances.employeeId')
        ->where('performances.employeeId',$id)
        ->select('performances.*','employees.id as perId')
        ->get();
        return view('employees.performance.performance_info', compact('id', 'performances_info'));

    }

    public function store_performances(Request $request)
    {
        $id = $request->id;
        $employee = new performances();

        $employee->employeeId = $request->id;
        $employee->year = $request->year;
        $employee->puntuality = $request->puntuality;
        $employee->job_knowledge = $request->job_knowledge;
        $employee->initiative = $request->initiative;
        $employee->attendace = $request->attendace;
        $employee->ednQualification = $request->ednQualification;
        $employee->honesty = $request->honesty;
        $employee->sincerity = $request->sincerity;
        $employee->lengthOfService = $request->lengthOfService;
        $employee->customerFocus = $request->customerFocus;
        $employee->CommSkill = $request->CommSkill;
        $employee->professionalism = $request->professionalism;
        $employee->behaviour = $request->behaviour;
        $employee->goal = $request->goal;
        $employee->pdd = $request->pdd;
        $employee->save();

        $notification = array('messege' => 'performance Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.performance', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

 
    public function performances_info(Request $request)
    {
        $per_id = $request->per_id;
        $data['performance_info'] = DB::table('performances')
        ->select('performances.*')
        ->where('id', $per_id)
        ->get();
         echo json_encode($data);
    }

    public function update_performances(Request $request){

        $id = $request->id;
        $employee = performances::findOrFail($id);
        $employee->year = $request->year;
        $employee->puntuality = $request->puntuality;
        $employee->job_knowledge = $request->job_knowledge;
        $employee->initiative = $request->initiative;
        $employee->attendace = $request->attendace;
        $employee->ednQualification = $request->ednQualification;
        $employee->honesty = $request->honesty;
        $employee->sincerity = $request->sincerity;
        $employee->lengthOfService = $request->lengthOfService;
        $employee->customerFocus = $request->customerFocus;
        $employee->CommSkill = $request->CommSkill;
        $employee->professionalism = $request->professionalism;
        $employee->behaviour = $request->behaviour;
        $employee->goal = $request->goal;
        $employee->pdd = $request->pdd;
        $employee->save();

        $notification = array('messege' => 'performance Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.performance', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }
    public function destroy_performance($id)
    {
        performances::destroy($id);
        return back();
    }

    public function transfer(Request $request, $id)
    {
        $designation_info = designations::get();
        $company_info = companies::get();
        $department_info = departments::get();
        $section_info = sections::get();
        $shift_info = shifts::get();
        
        $transfers_info = transferemloyees::leftjoin('employees', 'transferemloyees.ttr_id', '=', 'employees.id')
        ->leftjoin('designations', 'transferemloyees.designation', '=', 'designations.id')
        ->leftjoin('departments', 'transferemloyees.department', '=', 'departments.id')
        ->leftjoin('companies', 'transferemloyees.company', '=', 'companies.id')
        ->leftjoin('sections', 'transferemloyees.section', '=', 'sections.id')
        ->leftjoin('shifts', 'transferemloyees.shift', '=', 'shifts.id')
        ->where('transferemloyees.ttr_id',$id)
        ->select('transferemloyees.*','employees.id as perId', 'designations.desig_name', 'departments.dept_name', 'companies.name', 'sections.section_name','shifts.shift');
        $transfers_info=$transfers_info ->get();
        return view('employees.ttrList.ttrList_info', compact('transfers_info', 'id', 'designation_info', 'company_info', 'department_info', 'section_info', 'shift_info'));
    }

    

    public function store_ttrLists(Request $request)
    {
        $id = $request->id;
        $employee = new transferemloyees();

        $employee->ttr_id = $request->id;
        $employee->	company = $request->company;
        $employee->department = $request->department;
        $employee->designation = $request->designation;
        $employee->shift = $request->shift;
        $employee->date = $request->date;
        $employee->section = $request->section;
        $employee->reason = $request->reason;
        $employee->save();

        $notification = array('messege' => 'transfer Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.transfer', $employee->ttr_id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function  transfers_info(Request $request)
    {
        $tra_id = $request->tra_id;
        $data['transfer_info'] = DB::table('transferemloyees')
        ->select('transferemloyees.*')
        ->where('id', $tra_id)
        ->get();
         echo json_encode($data);
    }
   
    public function update_transfers(Request $request){

        $id = $request->id;
        $employee = transferemloyees::findOrFail($id);
        $employee->	company = $request->company;
        $employee->department = $request->department;
        $employee->designation = $request->designation;
        $employee->shift = $request->shift;
        $employee->	date = $request->date;
        $employee->section = $request->section;
        $employee->reason = $request->reason;
        $employee->save();
        

        $notification = array('messege' => 'transfers Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.transfer', $employee->ttr_id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function destroy_transfer($id)
    {
        transferemloyees::destroy($id);
        return back();
    }


    public function disipline(Request $request, $id)
    {
     
        $disciplines_info = disciplines::Join('employees', 'employees.id', '=', 'disciplines.employeeId')
       ->where('disciplines.employeeId',$id)
       ->select('disciplines.*','employees.id as disId' )
        ->get();
    //    dd($disciplines_info);
        return view('employees.disipline.discipline_info', compact('id', 'disciplines_info'));
    }

    public function store_disipline(Request $request)
    {
        $id = $request->id;
        $employee = new disciplines();
        $employee->employeeId = $request->id;
        $employee->type = $request->type;
        $employee->ref_number = $request->ref_number;
        $employee->date = $request->date;
        $employee->reason = $request->reason;
        
        
        $employee->save();

        $notification = array('messege' => 'disipline Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.disipline', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function disiplines_info(Request $request)
    {
        $dis_id = $request->dis_id;
        //dd($dis_id);
        $data['disipline_info'] = DB::table('disciplines')
        ->select('disciplines.*')
        ->where('id', $dis_id)
        ->get();
        echo json_encode($data);
    }
    public function update_disiplines(Request $request){

        $id = $request->id;
        $employee = disciplines::findOrFail($id);
        $employee->type = $request->type;
        $employee->ref_number = $request->ref_number;
        $employee->date = $request->date;
        $employee->reason = $request->reason;
        $employee->save();

        $notification = array('messege' => 'discipline Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.disipline', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function destroy_disipline($id)
    {
        disciplines::destroy($id);
        return back();
    }



    public function view(Request $request, $id)
    {
        $designation_info = designations::get();
        $company_info = companies::get();
        $department_info = departments::get();
        $section_info = sections::get();
        $shift_info = shifts::get();
        
        $transfers_info = transferemloyees::leftjoin('employees', 'transferemloyees.ttr_id', '=', 'employees.id')
        ->leftjoin('designations', 'transferemloyees.designation', '=', 'designations.id')
        ->leftjoin('departments', 'transferemloyees.department', '=', 'departments.id')
        ->leftjoin('companies', 'transferemloyees.company', '=', 'companies.id')
        ->leftjoin('sections', 'transferemloyees.section', '=', 'sections.id')
        ->leftjoin('shifts', 'transferemloyees.shift', '=', 'shifts.id')
        ->where('transferemloyees.ttr_id',$id)
        ->select('transferemloyees.*','employees.id as perId', 'designations.desig_name', 'departments.dept_name', 'companies.name', 'sections.section_name','shifts.shift')
        ->get();

        $academic_info = academicinfos::Join('employees', 'employees.id', '=', 'academicinfos.employeeId'  )
        ->where('academicinfos.employeeId',$id)
        ->select('academicinfos.*','employees.id as emId')
        ->get();
        
         $materials_info = employeematerials::Join('employees', 'employees.id', '=', 'employeematerials.employeeId'  )
        ->where('employeematerials.employeeId',$id)
        ->select('employeematerials.*','employees.id as maId')
        ->get();
        $performances_info = performances::Join('employees', 'employees.id', '=', 'performances.employeeId')
        ->where('performances.employeeId',$id)
        ->select('performances.*','employees.id as perId')
        ->get();
        $disciplines_info = disciplines::Join('employees', 'employees.id', '=', 'disciplines.employeeId')
       ->where('disciplines.employeeId',$id)
       ->select('disciplines.*','employees.id as disId' )
        ->get();


        $employee_view = employees::findOrFail($id);
        $employees = employees::leftjoin('designations', 'employees.designation', '=', 'designations.id')
        ->leftjoin('departments', 'employees.department', '=', 'departments.id')
        ->leftjoin('companies', 'employees.company','=', 'companies.id')
        ->leftjoin('sections', 'employees.section', '=', 'sections.id')
        ->leftjoin('subsections', 'employees.sub_section', '=', 'subsections.id')
        ->leftjoin('shifts', 'employees.shift', '=', 'shifts.id')
        ->where('employees.id',$id)
        ->select('employees.*', 'employees.id as emvId', 'designations.desig_name', 'departments.dept_name','companies.name as com_name', 
    'sections.section_name','subsections.name', 'shifts.shift' );
        $employees = $employees->get();
    
 
        
       
        return view('employees.employee_view', compact('id', 'employee_view', 'employees', 'academic_info', 'materials_info',
     'performances_info', 'disciplines_info', 'transfers_info', 'company_info', 'department_info', 'section_info', 'shift_info'));
    }
    public function destroy($id)
    {
        employees::destroy($id);
        return redirect()->route('employees');
    }


    public function rejectedEmplyee(){

        $rejectedEloployees=employees::
        leftJoin('departments','employees.department','=','departments.id')
        ->leftJoin('designations','employees.designation','=','designations.id')
            ->select('employees.*','departments.dept_name','designations.desig_name')
            ->where('status','Terminated')->get();
        return view('employees.rejected_list',compact('rejectedEloployees'));
    }

    public function resingedEmplyee(){
        $resigned_employees= employees::
        leftJoin('departments','employees.department','=','departments.id')
            ->leftJoin('designations','employees.designation','=','designations.id')
            ->select('employees.*','departments.dept_name','designations.desig_name')
            ->where('status','Resigned')->get();
        return view('employees.resigned_list',compact('resigned_employees'));
    }
    public function ActivatedRejectedEmployee(Request $request,$id){
        $rejectedEloployee = employees::findOrFail($id);
        $rejectedEloployee -> status = "Active";
        $rejectedEloployee->save();
        return redirect()->route('rejected_list')->with('message','Rejected successfully');

    }
    public function ActivatedResignedEmployee(Request $request,$id){
        $resigned_employee = employees::findOrFail($id);
        $resigned_employee -> status = "Active";
        $resigned_employee -> save();
        return redirect()->route('resigned_list')->with('message','Resigned undone');
    }

   
}

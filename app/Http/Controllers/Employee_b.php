<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\academics;
use App\Models\materials;
use App\Models\performances;
use App\Models\transferemloyees;
use App\Models\disciplines;
use App\Models\resigneds;
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
            ->select('employees.*', 'designations.desig_name')
            ->select('employees.*', 'departments.dept_name')
            ->where('employees.status', 'Active')
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

        return view('employees.service.service_info', compact('step', 'id', 'designation_info', 'company_info', 'department_info', 'section_info', 'subsection_info'));
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
            'salary' => 'required',
            'department' => 'required',
            'employee_id' => 'required',
            'designation' => 'required',
        ]);

        $employee = new employees;
        $employee->company = $validatedData['company'];
        $employee->salary_unit = $validatedData['salary'];
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
        $employee->resume = $request['resume'];
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
        $employee->resume = $request['resume'];
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
        $employee->photo = $request->em_photo;
        $employee->voterId = $request->niId;
        $employee->voterImage = $request->ni_image;
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

    public function academic(Request $request, $id)
    {

        //$employee = employees::findOrFail($id);
        $academic_info = academics::Join('employees', 'employees.id', '=', 'academics.employee_id'  )
        ->where('employee_id',$id)
        ->select('academics.*','employees.id as emId')
        ->get();
        return view('employees.academic.academic_info', compact('id','academic_info'));
    }
    public function store_academic(Request $request)
    {
        $id = $request->id;
        $employee = new academics();

        $employee->employee_id = $request->id;

        $employee->examTitle = $request->exam_title;
        $employee->institute = $request->institute;
        $employee->result = $request->result;
        $employee->passingYear = $request->passing_year;
        $employee->save();

        $notification = array('messege' => 'academic Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.academic', $employee->employee_id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }
    public function academic_info(Request $request)
    {
        $acad_id = $request->acad_id;
        $data['academic_info'] = DB::table('academics')
        ->select('academics.*')
        ->where('id', $acad_id)
        ->get();
        echo json_encode($data);
    }
    
    public function update_academic(Request $request)
    {
        
        $id = $request->id;
        $employee = academics::findOrFail($id);

        
        $employee->examTitle = $request->exam_title;
        $employee->institute = $request->institute;
        $employee->result = $request->result;
        $employee->passingYear = $request->passing_year;
        $employee->save();

        $notification = array('messege' => 'Academic Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.academic', $employee->employee_id)->with($notification);
        } else {

            return "Unit was not Created";
        }
        
    }

    public function materials(Request $request, $id)
    {

        // $employee = employees::findOrFail($id);
        $materials_info = materials::Join('employees', 'employees.id', '=', 'materials.employee_id'  )
        ->where('employee_id',$id)
        ->select('materials.*','employees.id as maId')
        ->get();
        return view('employees.materials.materials_info', compact('id','materials_info'));
    }

    public function store_materials(Request $request)
    {
         $id = $request->id;
        $employee = new materials();
        $employee->employee_id = $request->id;
        $employee->	materials_name = $request->materials;
        $employee->qty = $request->qty;
        $employee->issue_date = $request->issue_date;
        $employee->warranty = $request->warranty;
        $employee->	price = $request->price;
        $employee->description = $request->description;
        $employee->save();

        $notification = array('messege' => 'materials Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.materials', $employee->employee_id)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }
    public function materials_info(Request $request)
    {
        $mate_id = $request->mate_id;
        $data['material_info'] = DB::table('materials')
        ->select('materials.*')
        ->where('id', $mate_id)
        ->get();
        echo json_encode($data);
    }
    public function update_materials(Request $request){

        $id = $request->id;
        $employee = materials::findOrFail($id);
        $employee->	materials_name = $request->materials;
        $employee->qty = $request->qty;
        $employee->issue_date = $request->issue_date;
        $employee->warranty = $request->warranty;
        $employee->	price = $request->price;
        $employee->description = $request->description;
        $employee->save();

        $notification = array('messege' => 'materials Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.materials', $employee->employee_id)->with($notification);
        } else {
            return "Unit was not Created";
        }
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





    // $performances_info = performances::Join('employees', 'employees.id', '=', 'performances.employeeId')
    // ->where('performances.employeeId',$id)
    // ->select('performances.*','employees.id as perId')


    public function transfer(Request $request, $id)
    {
        $designation_info = designations::get();
        $company_info = companies::get();
        $department_info = departments::get();
        $section_info = sections::get();
        $shift_info = shifts::get();
        
        $transfers_info = transferemloyees::leftjoin('employees', 'transferemloyees.employeeId', '=', 'employees.id')
        ->leftjoin('designations', 'transferemloyees.designation', '=', 'designations.id')
        ->leftjoin('departments', 'transferemloyees.department', '=', 'departments.id')
        ->leftjoin('companies', 'transferemloyees.company', '=', 'companies.id')
        ->leftjoin('sections', 'transferemloyees.section', '=', 'sections.id')
        ->leftjoin('shifts', 'transferemloyees.shift', '=', 'shifts.id')
        ->where('transferemloyees.employeeId',$id)
        ->select('transferemloyees.*','employees.id as perId', 'designations.desig_name', 'departments.dept_name', 'companies.name', 'sections.section_name','shifts.shift');
        $transfers_info=$transfers_info ->get();
        return view('employees.ttrList.ttrList_info', compact('transfers_info', 'id', 'designation_info', 'company_info', 'department_info', 'section_info', 'shift_info'));
    }

    

    public function store_ttrLists(Request $request)
    {
        $id = $request->id;
        $employee = new transferemloyees();

        $employee->employeeId = $request->id;
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
            return redirect()->route('list.transfer', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }

    public function  transfers_info(Request $request)
    {
        $tra_id = $request->tra_id;
        $data['performance_info'] = DB::table('transferemloyees')
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
            return redirect()->route('list.transfer', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
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

    public function resigned(Request $request, $id)
    {
        $resigneds_info = resigneds::Join('employees', 'employees.id', '=', 'resigneds.employeeId')
        ->where('resigneds.employeeId',$id)
        ->select('resigneds.*','employees.id as resId' )
         ->get();
        return view('employees.resigned.resigned_info', compact('id', 'resigneds_info'));
    }
    

    public function store_resigned(Request $request)
    {
        $id = $request->id;
        $employee = new resigneds();
        $employee->employeeId = $request->id;
        $employee->resignedType = $request->resignedType;
        $employee->res_date = $request->res_date;
        $employee->resi_reason = $request->resi_reason;
        $employee->save();

        $notification = array('messege' => 'Resigned Data Inserted!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.resigned', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }
    public function resigneds_info(Request $request)
    {
        $res_id = $request->res_id;
        //dd($dis_id);
        $data['resigned_info'] = DB::table('resigneds')
        ->select('resigneds.*')
        ->where('id', $res_id)
        ->get();
        echo json_encode($data);
    }
    

    public function update_resigneds(Request $request){

        $id = $request->id;
        $employee = resigneds::findOrFail($id);
        $employee->resignedType = $request->resignedType;
        $employee->res_date = $request->res_date;
        $employee->resi_reason = $request->resi_reason;
        $employee->save();

        $notification = array('messege' => 'resigneds Data Update!', 'alert-type' => 'success');
        if ($employee) {
            return redirect()->route('list.resigned', $employee->employeeId)->with($notification);
        } else {
            return "Unit was not Created";
        }
    }









    public function view(Request $request, $id)
    {
        $employee_view = employees::findOrFail($id);
        return view('employees.view', compact('employee_view'));
    }
    public function destroy($id)
    {
        employees::destroy($id);
        return redirect()->route('employee_list');
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

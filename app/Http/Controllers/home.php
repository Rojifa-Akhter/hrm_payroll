<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\attendances;
use App\Models\User;
use DB;

class home extends Controller
{
    public function index()
    {

        $total_employee=employees::get()->count();
        // echo $total_emloyee;
        // exit;
        $total_present=attendances::
        where('status','Present')
        ->get()->count();
        $total_sl=attendances::
        where('status','SL')
        ->get()->count();
        $total_hdl=attendances::
        where('status','HDL')
        ->get()->count();
        $total_movement=attendances::
        where('status','Movement')
        ->get()->count();
        $net_total_present=$total_present+$total_sl+$total_hdl+$total_movement;
        $total_absent=$total_employee-$net_total_present;
        return view('dashboard',compact('total_employee','net_total_present','total_absent'));
    }

    public function updateAttendance(Request $request)
    {

        if(!empty($update) && $update == true) {
            $postDate = $request['date'];
            $date = date('dmY', strtotime($postDate));
            $formatedDate = date('Y-m-d', strtotime($postDate));
        } else {
            $date = date('dmY');
            $formatedDate = date('Y-m-d');
        }

                    
        $employees=employees::get();
        $from=$formatedDate." "."00:00:00";
        $to=$formatedDate." "."23:59:59"; 
            foreach($employees as $employee){
            
                $employee['serialNo']=ltrim($employee['serialNo'],"0"); 
                
                $sql="select min(cio.checktime) as inTime,max(cio.checktime) as outTime from checkinout cio left join userinfo ui on cio.USERID=ui.USERID  where ui.BADGENUMBER='".$employee['serialNo']."' and CHECKTIME between '$from' and '$to' ";
                $punch_info=$this->m_common->customeQuery($sql);

                if(!empty($punch_info[0]['inTime'])){
                    $insertData=array();
                    $insertData['timeIn']=$punch_info[0]['inTime'];
                    $insertData['timeOut']=$punch_info[0]['outTime'];
                    $insertData['date']=$formatedDate;
                    $insertData['employeeId']=$employee['id'];

                    $che =attendances::
                    where('date',$formatedDate)
                    ->where('employeeId',$employee->id)
                    ->first();
                    
                    if(!empty($che)){
                        
                        $che->timeIn=$punch_info[0]['inTime']; 
                        $che->timeIn=$punch_info[0]['outTime']; 
                        $che->save();
                                    
                    }else{
                            
                            User::insert($insertData);
                    }

                }
            }


           

            $all_attendance=attendances::
            leftJoin('employees','attendances.employeeId','=','employees.id')
            ->leftJoin('shifts','employees.shift','=','shifts.id')
            ->where('date',$formatedDate)
            ->select('attendances.*','employees.shift','shifts.startTime','shifts.endTime')
            ->get();
            
            foreach ($all_attendance as $att) {
                $update_atten_info =attendances::
                    where('id',$att->id)
                    ->first();
                $start = $att->timeIn;
                $in_time = strtotime($start);
                $shift_start_time = strtotime($formatedDate . ' ' . $att->startTime);


                if ($in_time > $shift_start_time) {
                    $update_atten_info->status="Late"; 
                    $update_atten_info->save();
                    
                }else{
                    $update_atten_info->status="Present"; 
                    $update_atten_info->save();
                }


                $shift_end_time = strtotime($formatedDate . ' ' . $att->endTime);
                $end = $att->timeOut;
                $out_time = strtotime($end);

               
                if ($out_time < $shift_end_time) {
                    $update_atten_info->status="Early"; 
                    $update_atten_info->save();
                    
                }else if ($in_time > $shift_start_time) {
                    $update_atten_info->status="Late"; 
                    $update_atten_info->save();
                    
                }else {
                    $update_atten_info->status="Present"; 
                    $update_atten_info->save();
                    
                }



            }    

        return redirect()->route('leavetype_list');    

    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\leavetypes;
use App\Models\companies;
use App\Models\employees;
use App\Models\acl_root_items;
use App\Models\acl_access_types;
use App\Models\acl_item_lists;
use App\Models\User;
use DB;

class acl_role extends Controller
{
    public function index()
    {   
        $users=User::get(); 
        return view('acl_roles.user_list',compact('users'));
    }


    public function add_acl()
    {    
     
        $employees= employees::get();
        $all_employees= employees::get();
        $menu = acl_root_items::get();
        $access_type= acl_access_types::get();
        $menuData = array();
        foreach ($menu as $key => $me) {
            $menuData[$key]['value'] = $me;
            $menuData[$key]['subMenu'] = acl_item_lists::
            where('root_id',$me->id)
            ->get();
            //$menuData[$key]['subMenu'] = $this->m_common->get_row_array('acl_item_list', array('root_id' => $me['id']), '*');
        }
        
        $companies=companies::get();
        return view('acl_roles.add',compact('companies','employees','all_employees','menu','menuData','access_type'));
    }

    public function store(Request $request)
    {  
        $insertData = array();
        $insertData['employeeId'] =$employee_id= $request['employee_id'];
        //$company = $this->m_common->get_row_array('employee', array('id' => $insertData['employeeId']), 'company');
        $insertData['email'] = $request['email'];
        $insertData['username'] =$user_name= $request['username'];
        $insertData['password'] =$request['password'] ;
        $insertData['user_type'] = $request['userType'];
        $insertData['approver1'] = $request['approver1'];
        $insertData['approver2'] = $request['approver2'];
        $insertData['approver3'] = $request['approver3'];
        $insertData['approver4'] =$request['approver4'];
        $insertData['status'] = 1;
        //$insertData['company'] = $company[0]['company'];
        $insertData['userRole'] = serialize($request['role']);
        $insertData['userMenu'] = serialize($request['menu']);
        
        $insertData['assign_company'] = serialize($request['assign_company']);     

        
        User::insert($insertData);
        return redirect()->route('leavetype_list');
        
    }

    public function edit_acl_role(Request $request, $id)
    { 
        
        
        $employees= employees::get();
        $all_employees= employees::get();
        $menu = acl_root_items::get();
        $access_type= acl_access_types::get();
        $menuData = array();
        foreach ($menu as $key => $me) {
            $menuData[$key]['value'] = $me;
            $menuData[$key]['subMenu'] = acl_item_lists::get();
            //$menuData[$key]['subMenu'] = $this->m_common->get_row_array('acl_item_list', array('root_id' => $me['id']), '*');
        }
        $data['menu'] = $menuData;
        $companies=companies::get();

        $user_info= User::findOrFail($id);
        return view('acl_role.edit',compact('companies','employees','all_employees','menu','menuData','access_type','user_info'));

    }

    public function update(Request $request)
    {  

        $id=$request->id;
        $user_info = User::findOrFail($id);
      
        $user_info->employeeId = $request->employee_id;
        $user_info->email = $request->email;
        $user_info->username = $request->username;
        $user_info->user_type = $request->userType;
        $user_info->approver1 = $request->approver1;
        $user_info->approver1 = $request->approver1;
        $user_info->approver3 = $request->approver3;
        $user_info->approver4 = $request->approver4;
        $user_info->userRole = serialize($request->role);
        $user_info->userMenu = serialize($request->menu);
        $user_info->assign_company =serialize($request->assign_company);

        $user_info->save();   

        return redirect()->route('leavetype_list');
        
    }


    public function view_leavetype(Request $request, $id)
    {    
        $leavetype_info= leavetypes::findOrFail($id);    
        return view('settings.leavetype.view',compact('leavetype_info'));
    }


    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('leavetype_list');
    }

}

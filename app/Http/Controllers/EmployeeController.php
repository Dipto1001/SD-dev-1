<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=employee::all();
        return view('admin/employee',$result);
    }

    /**
     * Show the form for viewing  managing category using edit button action
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_employee($id='')
    {
        // for dynamic control of id, we get id when it is greater than 1 need to use for edit button.
        if($id>0){
            
            $arr=employee::where(['id'=>$id])->get();
            $result['name']=$arr['0']->name;
            $result['email']=$arr['0']->email;
            $result['salary']=$arr['0']->salary;
            $result['birth_date']=$arr['0']->birth_date;
            $result['department']=$arr['0']->department;
            
            $result['gender']=$arr['0']->gender;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;

        }
        else{
            $result['name']='';
            $result['email']='';
            $result['salary']='';
            $result['birth_date']='';
            $result['department']='';
            $result['gender']='';
            $result['status']='';
            $result['id']=0;
        }
        
        return view('admin/manage_employee',$result);
    }


     /**
     * Show the form for managing category process CRUD.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_employee_process(Request $request)
    {
       // return $request->post();
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:employees,email,'.$request->post('id'),
            'salary'=>'required',
            'birth_date'=>'required',
            'department'=>'required',
            
        ]);

       //when validation completed than show message
       
       if($request->post('id')>0){
        $model=employee::find($request->post('id'));
        $msg="Data Updated Successfully";
       }else{
        $model=new employee();
        $msg="Data Inserted Successfully";
       }
        //sql data inserting comment
       $model->name=$request->post('name');
       $model->email=$request->post('email');
       $model->salary=$request->post('salary');
       $model->birth_date=$request->post('birth_date');
       $model->department=$request->post('department');
       $model->gender=$request->post('gender');
       $model->status=1;
       
       $model->save();

       $request->session()->flash('message',$msg);
       return redirect('admin/employee');

    }
    
    //function for deleting data from database
    public function delete(Request $request,$id)
    {
        $model=employee::find($id);
        $model->delete();
        $request->session()->flash('message','Employee data deleted Successfully');
        return redirect('admin/employee');

        
        
    }
    //function for status (active-inactive)
    public function status(Request $request,$status,$id)
    {
         $model=employee::find($id);
         $model->status=$status;
         $model->save();
         $request->session()->flash('message','Status Updated Successfully');
         return redirect('admin/employee');

         //echo $status;
         //echo $id;

        

        
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Category::all();
        return view('admin/category',$result);
    }

    /**
     * Show the form for viewing  managing category using edit button action
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_category($id='')
    {
        // for dynamic control of id, we get id when it is greater than 1 need to use for edit button.
        if($id>0){
            $arr=Category::where(['id'=>$id])->get();
            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;

        }
        else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']=0;
        }
        
        return view('admin/manage_category',$result);
    }


     /**
     * Show the form for managing category process CRUD.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_category_process(Request $request)
    {
        //return $request->post();
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id')
        ]);

       
       
       if($request->post('id')>0){
        $model=Category::find($request->post('id'));
        $msg="Data Updated Successfully";
       }else{
        $model=new Category();
        $msg="Data Inserted Successfully";
       }

       $model->category_name=$request->post('category_name');
       $model->category_slug=$request->post('category_slug');
       $model->save();

       $request->session()->flash('message',$msg);
       return redirect('admin/category');

    }
    
    //function for deleting data from database
    public function delete(Request $request,$id)
    {
        $model=Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted Successfully');
        return redirect('admin/category');

        
        
    }


    
}

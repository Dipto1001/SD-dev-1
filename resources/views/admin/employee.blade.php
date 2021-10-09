@extends('admin.layout')

@section('container')
    {{session('message')}} <!-- success message-->
    
     
<h1>Employee</h1>

<div class="col m-t-10">
    <a href="employee/manage_employee">
        <button type="button" class="btn btn-success">Add Employee</button>
    </a>
</div>
<div class="row m-t-20">
    <div class="col-md-12">
        <!-- DATA TABLE for showing the employee data-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>salary</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
                        <th>department</th>
                        <th>status</th>

                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->salary}}</td>
                        <td>{{$list->birth_date}}</td>
                        <td>{{$list->gender}}</td>
                        <td>{{$list->department}}</td>
                        <td>
                            @if ($list->status==1)
                                
                            <a href="{{url('admin/employee/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-success">Active</button></a>
                           
                           @elseif($list->status==0)

                            <a href="{{url('admin/employee/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>   
                           @endif
                        </td>
                        <td>
                            <a href="{{url('admin/employee/manage_employee/')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            
                            <a href="{{url('admin/employee/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                        
                        
                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>
            
           


   
@endsection
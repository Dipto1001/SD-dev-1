@extends('admin.layout')

@section('container')
    
    
     
<h1>Employee</h1>

<div class="col m-t-10">
    <a href="{{url('admin/employee')}}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
</div>
<div class="row m-t-20">
    <div class="col-md-12">
        
        <div class="col-lg-10">
            {{session('message')}}
            <div class="card">
                <div class="card-header">Manage Employee</div>
                <div class="card-body">
                    
                    <!-- Employee registration form control for CRUD Start -->
                    <form action="{{route('employee.manage_employee_process')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Employee Name</label>
                            <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                           @error('name')
                               <div class="alert alert-danger" role="alert">
                                 {{$message}}
                               </div>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label mb-1">Employee Email</label>
                            <input id="email" value="{{$email}}" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" required>
                           @error('email')
                               <div class="alert alert-danger" role="alert">
                                 {{$message}}
                               </div>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label for="salary" class="control-label mb-1">Salary</label>
                            <input id="salary" value="{{$salary}}" name="salary" type="int" class="form-control" aria-required="true" aria-invalid="false" required>
                           @error('salary')
                               <div class="alert alert-danger" role="alert">
                                 {{$message}}
                               </div>
                           @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="birth_date" class="control-label mb-1">Birth Date</label>
                            <input id="birth_date" type="date" name="birth_date" class="form-control"  placeholder="" value ="{{$birth_date}}" aria-required="true" aria-invalid="false" required>
                            @error('birth_date')
                            <div class="alert alert-danger" role="alert">
                              {{$message}}
                            </div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="department" class="control-label mb-1">Department : <input value="{{$department}}"></label>
                            
                                <div >
                                    
                                      <select class="form-control" id="department"  name="department">
                                        
                                        <option value="none"> None selected </option>
                                         <option value="CSE" > Computer Science & Engineering </option>
                                         <option value="ME"> Mechanical Engineering </option>
                                         <option value="CE"> Civil Engineering </option>
                                     </select>
                                     
                                 </div>
                            
                                 
                            @error('department')
                               <div class="alert alert-danger" role="alert">
                                 {{$message}}
                               </div>
                           @enderror
                         </div>

                         

                         <div class="form-group">
                            <label for="gender" class="control-label mb-1">Gender : <input value="{{$gender}}"></label>
                            <div class="mt-2">
                            <div class="form-check-inline">
                            <div class="form-group" value ="{{$gender}}" aria-required="true" aria-invalid="false" >
                                 <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                                 <label class="form-check-label" for="gender">
                                     Male
                                 </label>

                                  <input class="form-check-input" type="radio" name="gender" id="gender"  value="Female">
                                   <label class="form-check-label" for="gender">
                                      Female
                                   </label>

                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="other">
                                       <label class="form-check-label" for="gender">
                                       other
                                       </label>
                                     </div>
                                  </div>
                                </div>
                           </div>  
                           @error('gender')
                           <div class="alert alert-danger" role="alert">
                             {{$message}}
                           </div>
                       @enderror
                     </div>

                        
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                               submit
                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{$id}}"/>
                    </form>
                    <!-- Employee registration form control for CRUD Ends-->
                </div>
            
    </div>
            
           
</div>

@endsection


     
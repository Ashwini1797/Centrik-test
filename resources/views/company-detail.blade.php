@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-9">
            
                <div style="padding-bottom: 10px;">
                    <a href="{{route('company-list')}}" class="btn btn-primary" role="button"
                    >Company List</a>
                </div>
                <div class="card">

                    <div class="card-header">{{ __('Companies Details') }}</div>
                    <div class="card card-text" style="padding: 20px;">
                        Company Name : {{$companyData->name}}
                        <br>
                        Company Email Id : {{$companyData->email}}
                        <br>
                        Company Website : {{$companyData->website}}

                    </div>
                    <div style="padding:10px 10px 10px 36px;">
                        <button type="button" class="btn btn-primary col-lg-4 col-md-3 rounded-2xl py-2 px-3 active" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" data-bs-whatever="@mdo">Create New Employee</button>
                    </div>

                    <div class="card col-md-10 col-lg-11" style="margin:auto; padding: 0px;">
                        <div class="card-header">{{ __('Employee List') }}</div>
                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="300px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($companyData->employees) && $companyData->employees->count())
                                @foreach($companyData->employees as $key => $value)
                                    <tr>
                                        <td>{{$value->first_name}}
                                            {{" "}}{{$value->last_name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>
                                            <a style="color: white; margin-right: 10px;" id="editCompany" class="btn btn-success" href="/edit-employee/{{$value->id}}">
                                                Edit
                                            </a>
                                            <a style="color: white;" href="/delete-employee/{{$value->id}}"
                                               class="btn btn-danger" onclick="return confirm('Are you sure ypu wants to delete {{$value->first_name}} {{''}} {{$value->last_name}} employee ?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- add employee model -->

                    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Employee Detail</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('store-employee')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <input type="hidden" name="employee_company_id" value="{{request()->route('id')}}">

                                        <div class="form-group">
                                            <label for="inputFName">First Name<span style="color:red"> *</span> :</label>
                                            <input type="text" class="form-control" name="employee_first_name"
                                                   placeholder="Enter First Name">
                                            @if ($errors->has('employee_first_name'))
                                                <span class="text-danger">{{ $errors->first('employee_first_name') }}</span>
                                            @endif


                                        </div>

                                        <div class="form-group">
                                            <label for="inputLName">Last Name<span style="color:red"> *</span> :</label>
                                            <input type="text" class="form-control" name="employee_last_name"
                                                   id="inputLName" placeholder="Enter Last Name">
                                            @if ($errors->has('employee_last_name'))
                                                <span class="text-danger">{{ $errors->first('employee_last_name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail">Email<span style="color:red"> *</span> :</label>
                                            <input type="email" class="form-control" name="employee_email" id="inputEmail" placeholder="Enter Email">
                                            @if ($errors->has('employee_email'))
                                                <span class="text-danger">{{ $errors->first('employee_email') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPhone">Phone<span style="color:red"> *</span> :</label>
                                            <input type="text" class="form-control" name="employee_phone" min="10"
                                                   max="10"
                                                   id="inputPhone" placeholder="Enter Phone">
                                            @if ($errors->has('employee_phone'))

                                                <span class="text-danger">{{ $errors->first('employee_phone') }}</span>

                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection


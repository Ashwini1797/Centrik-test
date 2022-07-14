@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8 col-lg-8">
        <div style="padding-bottom: 10px;"><a href="{{ url()->previous() }}" class="btn btn-primary" role="button">Back</a></div>

        <div class="card">
        <div class="card-header">{{ __('Update Employee details') }}</div>

            <div class="card-content" style="padding: 20px;">

                <form action="{{ route('update-employee')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <input type="hidden" name="employee_employee_id" value="{{$employeeData->id}}">

                                        <div class="form-group">
                                            <label for="inputFName">First Name<span style="color:red"> *</span> :</label>
                                            <input type="text" class="form-control" name="employee_first_name"
                                                   placeholder="Enter First Name" value="{{$employeeData->first_name}}" required>
                                                   @if ($errors->has('employee_first_name'))

                                                    <span class="text-danger">{{ $errors->first('employee_first_name') }}</span>

                                                    @endif

                                        </div>

                                        <div class="form-group">
                                            <label for="inputLName">Last Name<span style="color:red"> *</span> :</label>
                                            <input type="text" class="form-control" name="employee_last_name"
                                                   id="inputLName" placeholder="Enter Last Name" value="{{$employeeData->last_name}}" required>
                                                   @if ($errors->has('employee_last_name'))

                                                    <span class="text-danger">{{ $errors->first('employee_last_name') }}</span>

                                                    @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail">Email<span style="color:red"> *</span> :</label>
                                            <input type="email" class="form-control" name="employee_email" id="inputEmail" placeholder="Enter Email" value="{{$employeeData->email}}" required>
                                            @if ($errors->has('employee_email'))

                                                    <span class="text-danger">{{ $errors->first('employee_email') }}</span>

                                                    @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPhone">Phone<span style="color:red"> *</span> :</label>
                                            <input type="text" class="form-control" name="employee_phone"
                                                   id="inputPhone" placeholder="Enter Phone" value="{{$employeeData->phone}}" required>
                                                   @if ($errors->has('employee_phone'))

                                                    <span class="text-danger">{{ $errors->first('employee_phone') }}</span>

                                                    @endif
                                         </div>
                                            <div class="modal-footer">
                                             <a href="{{ url()->previous() }}" class="btn btn-secondary white-text ">Cancel</a>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
            </div>

        </div>
    </div>

    </div></div>
</div>
@endsection

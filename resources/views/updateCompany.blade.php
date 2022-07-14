@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <div style="padding-bottom: 10px;">
                    <a href="{{ url()->previous() }}" class="btn btn-primary" role="button">Back</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Update Company details') }}</div>

                    <div class="card-content"  style="padding: 20px;">
                    
                        <form action="{{ route('updateCompany') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="hidden" name="company_id" value="{{request()->route('id')}}">

                                <label for="inputName">Company Name<span style="color:red"> *</span> :</label>
                                <input type="text" class="form-control" name="company_name" id="inputName"
                                       value="{{$companyData->name}}" placeholder="Enter Company Name" required>

                                <!-- @if ($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                @endif -->
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Email<span style="color:red"> *</span> :</label>
                                <input type="email" class="form-control" name="company_email" id="inputEmail" value="{{$companyData->email}}" placeholder="Enter Email" required>
                                <!-- @if ($errors->has('company_email'))

                                    <span class="text-danger">{{ $errors->first('company_email') }}</span>

                                @endif -->
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Address<span style="color:red"> *</span> :</label>
                                <input type="text" class="form-control" name="company_address" id="inputAddress" value="{{$companyData->address}}" placeholder="Enter Address" required>
                                <!-- @if ($errors->has('company_address'))

                                    <span class="text-danger">{{ $errors->first('company_address') }}</span>

                                @endif -->
                            </div>

                            <div class="form-group">
                                <label for="inputState">Logo<span style="color:red"> *</span> : </label>
                                <div style="display: flex; justify-content: space-between;">
                                    <div>
                                        <label for="inputState">Old Logo : </label>
                                        <img class="new-image-wrapper materialboxed" style="height: 100px; width:
                                        100px;" src="/storage/{{$companyData->logo}}">
                                    </div>
                                    <div>
                                        <label for="inputState">Update New Logo : </label>
                                        <input type="file" name="company_logo" class="form-control" required>

                                    </div>
                                </div>
                                <!-- @if ($errors->has('company_logo'))

                                    <span class="text-danger">{{ $errors->first('company_logo') }}</span>

                                @endif -->
                            </div>

                            <div class="form-group">
                                <label for="inputWebsite">Website<span style="color:red"> *</span> :</label>
                                <input type="text" class="form-control" name="company_website" value="{{$companyData->website}}" id="inputWebsite" placeholder="Enter Website URL" required>
                                <!-- @if ($errors->has('company_website'))

                                    <span class="text-danger">{{ $errors->first('company_website') }}</span>

                                @endif -->
                            </div>

                            <div class="modal-footer">
                                <a href="{{ route('company-list') }}" class="btn btn-secondary white-text ">Cancel</a>

                                <button type="submit" class="btn btn btn-primary white-text">Update Company</button>

                            </div>






                        </form>
                    </div>

                </div>
            </div>

        </div></div>
    </div>
@endsection

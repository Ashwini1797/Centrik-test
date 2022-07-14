@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-9">
            <div class="card">
                    <div class="card-header">{{ __('Add New Company') }}</div>

                    <div class="card-content"  style="padding: 20px;">
                       
                        <form action="{{ route('store-company') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Company Name<span style="color:red"> *</span> :</label>
                                    <input type="text" class="form-control" name="company_name" id="inputName"
                                           placeholder="Enter Company Name" value="{{old('company_name')}}">
                                    @if ($errors->has('company_name'))

                                        <span class="text-danger">{{ $errors->first('company_name') }}</span>

                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Email<span style="color:red"> *</span> :</label>
                                <input type="email" class="form-control" name="company_email" id="inputEmail" placeholder="Enter Email" value="{{old('company_email')}}">
                                @if ($errors->has('company_email'))
                                    <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Address<span style="color:red"> *</span> :</label>
                                    <input type="text" class="form-control" name="company_address" id="inputAddress" placeholder="Enter Address" value="{{old('company_address')}}">
                                    @if ($errors->has('company_address'))
                                        <span class="text-danger">{{ $errors->first('company_address') }}</span>
                                    @endif
                            </div>

                            <div class="form-group">
                            <label for="inputLogo">Company Logo <span style="color:red"> *</span> :</label>

                                <input type="file" name="company_logo" class="form-control">
                                @if ($errors->has('company_logo'))
                                    <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputWebsite">Website<span style="color:red"> *</span> :</label>
                                    <input type="text" class="form-control" name="company_website" id="inputWebsite" placeholder="Enter Website URL" value="{{old('company_website')}}">
                                    @if ($errors->has('company_website'))
                                        <span class="text-danger">{{ $errors->first('company_website') }}</span>
                                    @endif
                            </div>

                            <div class="modal-footer">
                                <a href="{{ route('company-list') }}" class="btn btn-secondary white-text ">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

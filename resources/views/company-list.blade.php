@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
            
                <div class="card">
                    <div class="card-header">{{ __('Companies') }}</div>

                    <div style="padding:10px 10px 10px 36px;">
                        <a href="{{route('create-company')}}" class="btn btn-primary col-lg-3 col-md-2 rounded-2xl py-2 px-2 active" role="button" aria-pressed="true">Create New Company</a>
                    </div>

                    <div class="card col-md-10 col-lg-11" style="margin:auto; padding: 0px;">
                        <div class="card-header">{{ __('Companies List') }}</div>
                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th>Company Logo</th>
                                <th>Company Name</th>
                                <th>Company Email</th>
                                <th>Company Website</th>
                                <th>Company Address</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($companyData) && $companyData->count())
                                @foreach($companyData as $key => $value)
                                    <tr>
                                        <td ><img class="new-image-wrapper materialboxed" style="height: 100px; width: 100px;"
                                                             src="/storage/{{$value->logo}}"></td>

                                        <td><a
                                                href="/company-detail/{{$value->id}}">{{$value->name}}</a></td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->website}}</td>
                                        <td>{{$value->address}}</td>

                                        <td style="display:flex;">
                                            <button class="btn btn-success" style="margin-right: 10px;">
                                                <a style="color: white;" href="/editCompany/{{$value->id}}">
                                                    Edit
                                                </a>
                                            </button>

                                            <button class="btn btn-danger">
                                                <a style="color: white;" href="/delete/{{$value->id}}" onclick="return confirm('Are you sure ypu wants to delete {{$value->name}} company?')">
                                                    Delete
                                                </a>
                                            </button>
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
                        <div class="display: flex; align-content: center; justify-content: flex-end;">{!! $companyData->links
                        () !!}</div>

                    </div>
                </div>
            </div>
        </div>
@endsection
<style>
    .w-5{
        display: none;
    }
    </style>

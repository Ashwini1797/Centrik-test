<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\{StoreEmployeeRequest, UpdateEmployeeRequest};


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $req_data = $request->validated();
        try{
            $employee = new Employee;
            $employee->id = (string)Uuid::generate(4);
            $employee->first_name = $req_data['employee_first_name'];
            $employee->last_name = $req_data['employee_last_name'];
            $employee->company_id = $req_data['employee_company_id'];
            $employee->email = $req_data['employee_email'];
            $employee->phone = $req_data['employee_phone'];
            $employee->save();
            if ($employee) {
                return redirect('/company-detail/'.$employee->company_id)->with('success', 'New Employee added sucessfully.');
            } else {
                return back()->with('error', 'Error Occurred.');
            }

        }catch(\Exception $e){
            logger($e);
            return back()->with('error', 'Error Occurred.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $employeeData = Employee::find($id);
            return view('Employee.UpdateEmployee', compact ('employeeData'));

        }catch(\Exception $e){
            logger($e);
            return redirect('/employee-list')->with('error', 'Error Occurred.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $req_data = $request->all();
            $employeeData = Employee::find($req_data['employee_employee_id']);
            if($employeeData){

                $employeeData->first_name = $req_data['employee_first_name'];
                $employeeData->last_name = $req_data['employee_last_name'];
                $employeeData->email = $req_data['employee_email'];
                $employeeData->phone = $req_data['employee_phone'];
                $employeeData->save();
                return redirect('/company-detail/'.$employeeData->company_id)->with('success', 'Successfully data Updated.');
            }else{
                return redirect('/company-detail/'.$employeeData->company_id)->with('success', 'Employee Not Found.');
            }

        }catch(\Exception $e){
            logger($e);
            return back()->with('error', 'Error Occurred.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $employeeDetails = Employee::find($id);

            if(!$employeeDetails){
                return back()->with('error',"Employee Not Found");
            }
            $employeeDetails->updated_by = Auth::id();
            $employeeDetails->delete();

            return back()->with('success',"Successfully Deleted.");
        }catch(\Exception $e){
            return back()->with('error',"Error Occurred");
        }
    }
}

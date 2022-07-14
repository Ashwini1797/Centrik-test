<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\{StoreCompanyRequest, UpdateCompanyRequest};

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try{
            $companyData = Company::paginate(10);
            return view('company-list', compact('companyData'));

        }catch(\Exception $e){
            logger($e);
            return back()->with('error', 'Error Occurred.');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $req_data = $request->validated();
        try{
            $company =  new Company;
            $company->id = (string)Uuid::generate(4);
            $company->name = $req_data['company_name'];
            $company->address = $req_data['company_address'];
            $company->email = $req_data['company_email'];


            $name = $request->file('company_logo')->getClientOriginalName();

            $path = $request->file('company_logo')->storeAs('/', $name, 'public');
            $company->logo = $path;

            $company->website = $req_data['company_website'];

            $company->save();

            if ($company) {
                return redirect('/company-list')->with('success', 'New company added sucessfully');
            } else {
                return back()->with('error', 'Company not added.');
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
        try{
            $companyData = Company::with('employees')->find($id);
            return view('company-detail', compact('companyData'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Error Occurred.');
        }
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
            $companyData = Company::find($id);
            return view('updateCompany', compact ('companyData'));

        }catch(\Exception $e){
            logger($e);
            return back()->with('error', 'Error Occurred.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request)
    {
        try{
            $req_data = $request->validated();
            $companyData = Company::find($req_data['company_id']);
            if($companyData){
                $companyData->name = $req_data['company_name'];
                $companyData->address = $req_data['company_address'];
                $companyData->email = $req_data['company_email'];
                if(isset($req_data['company_logo'])){
                    $name = $request->file('company_logo')->getClientOriginalName();

                    $path = $request->file('company_logo')->storeAs('/', $name, 'public');
                    $companyData->logo = $path;
                }
                $companyData->website = $req_data['company_website'];
                $companyData->save();
                return redirect('/company-list')->with('success', 'Successfully data Updated.');
            }else{
                return back()->with('error', 'Company Not Found.');
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

            $companyDetails = Company::find($id);

            if(!$companyDetails){
                return redirect('/company-list')->with('error', 'Company Not Found');
            }
            $companyDetails->updated_by = Auth::id();
            $companyDetails->delete();
            return redirect('/company-list')->with('success', 'Company deleted sucessfully.');

        }catch(\Exception $e){
            logger($e);
            return back()->with('error', 'Error Occurred.');
        }
    }
}

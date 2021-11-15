<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use App\Models\Thirds;
use App\Models\Clients;
use App\Models\Prospects;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\System\CompaniesPlusResources;
use App\Models\Companies;
use App\Models\Employees;

class CompaniesPlusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::get();
        return view("system.companies-plus.index",compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.companies-plus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'company_name'=>'required',
            'company_email'=>'required',
            'company_phone'=>'required',
        ],[
            'company_name.required'=>'Nom de la société est requis',
            'company_email.required'=>'Email de la société est requis',
            'company_phone.required'=>'Phone de la société est requis',
        ]);

        if(Thirds::where('name',$request->company_name)->exists()){
            Session::flash('error', 'société existe déja');
            return redirect()->back()->withInput();
        }

        if(Thirds::where('email',$request->company_email)->exists()){
            Session::flash('error', 'Email associé a une société');
            return redirect()->back()->withInput();
        }

        if(Thirds::where('phone',$request->company_phone)->exists()){
            Session::flash('error', 'Numéro associé a une société');
            return redirect()->back()->withInput();
        }

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try {
            $companies = new Companies();
            $companies->name = $request->company_name;
            $companies->alter_name = $request->company_altername;
            $companies->address_line = $request->company_address;
            $companies->city = $request->company_city;
            $companies->zip_code = $request->company_zip_code;
            $companies->country = $request->company_country;
            $companies->phone = $request->company_phone;
            $companies->email = $request->company_email;
            $companies->tax_number = $request->company_tax_number;
            $companies->save();
            
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Société créer avec succés");
        return redirect()->route('system-companies-plus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::find($id);
        return view('system.companies-plus.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'company_name'=>'required',
            'company_email'=>'required',
            'company_phone'=>'required',
        ],[
            'company_name.required'=>'Nom de la société est requis',
            'company_email.required'=>'Email de la société est requis',
            'company_phone.required'=>'Phone de la société est requis',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try {
            Companies::where('id',$id)->update([
                'name' => $request->company_name,
                'alter_name' => $request->company_altername,
                'address_line' => $request->company_address,
                'city' => $request->company_city,
                'zip_code' => $request->company_zip_code,
                'country' => $request->company_country,
                'phone' => $request->company_phone,
                'email' => $request->company_email,
                'tax_number' => $request->company_tax_number,
            ]);
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Société Modifier avec succés");
        return redirect()->route('system-companies-plus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Companies::find($id)->delete();
            Session::flash('success', "Utilisateur supprimer avec succés");
            return redirect()->route('system-companies-plus');
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }
    }
}

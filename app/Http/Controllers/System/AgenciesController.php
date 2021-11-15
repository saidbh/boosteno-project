<?php

namespace App\Http\Controllers\System;

use App\Models\Agencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agencies::get();
        return view('system.agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'avatar'=>'bail|file',
            'agency_name' => 'bail|required|string',
            'city' => 'bail|required|string',
            'address_agency' => 'bail|required|string|min:10',
            'zip_code' => 'bail|required|numeric|min:4',
            'phone' => 'bail|required|string|min:8',
            'fax' => 'bail|required|string|min:8',
            'email' => 'bail|required|email',
        ]);
        if($validator->fails()){
            Session::flash('error',$validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try{
            $agencies = new Agencies();
            $agencies->name = $request->agency_name;
            $agencies->city= $request->city;
            $agencies->address_line= $request->address_agency;
            $agencies->zip_code= $request->zip_code;
            $agencies->phone= $request->phone;
            $agencies->fax= $request->fax;
            $agencies->email= $request->email;
            $agencies->save();

            Session::flash('success', "Agence créer avec succés");
            return redirect()->back()->withInput();

        }catch(QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
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
        //
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
            'avatar'=>'bail|file',
            'agency_name' => 'bail|required',
            'city' => 'bail|required',
            'address_agency' => 'bail|required',
            'zip_code' => 'bail|required',
            'phone' => 'bail|required|min:8',
            'fax' => 'bail|required|min:8',
            'email' => 'bail|required|email',
        ]);
        if($validator->fails()){
            Session::flash('error',$validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try{
            Agencies::where('id',$id)->update([
                'name' => $request->agency_name,
                'city' => $request->city ,
                'address_line' => $request->address_agency,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email
            ]);

            Session::flash('success', "Mise a jour effectuer avec succès");
            return redirect()->back()->withInput();

        }catch(QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
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
        if(Agencies::where('id',$id)->first()->departments->count() != 0){
            Session::flash('error', 'L\'agence est assigné a une ou plusieurs département');
            return redirect()->back()->withInput();
        }
        try{
            Agencies::where('id',$id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success', 'Agence supprimer avec succés');
        return redirect()->back();
    }
}

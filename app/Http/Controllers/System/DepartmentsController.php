<?php

namespace App\Http\Controllers\System;

use App\Models\Agencies;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Departments::get();
        $agencies = Agencies::get();
        return view('system.departments.index', compact('departments','agencies'));
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
            'departement_name' => 'bail|required|string',
            'agency' => 'bail|numeric|nullable',
            'address_line' => 'bail|required|string|min:4',
            'city' => 'bail|required|string|min:4',
            'region' => 'bail|required|string|min:4',
            'zip_code' => 'bail|required|string|min:4',
        ]);
        if($validator->fails()){
            Session::flash('error',$validator->errors()->first());
            return redirect()->back()->withInput();
        }
        //
        try{
            $departments = new Departments();
            $departments->agencies_id = $request->agency;
            $departments->name = $request->departement_name;
            $departments->address_line = $request->address_line;
            $departments->city = $request->city;
            $departments->region = $request->region;
            $departments->zip_code = $request->zip_code;
            $departments->country = null;
            $departments->save();

            Session::flash('success', "Departement créer avec succés");
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
            'departement_name' => 'bail|required|string',
            'agency' => 'bail|numeric|nullable',
            'address_line' => 'bail|required|string|min:4',
            'city' => 'bail|required|min:4',
            'region' => 'bail|required|string|min:4',
            'zip_code' => 'bail|required|string|min:4',
        ]);
        if($validator->fails()){
            Session::flash('error',$validator->errors()->first());
            return redirect()->back()->withInput();
        }
        //
        try{

            Departments::where('id',$id)->update([
                'agencies_id' => $request->agency,
                'name' => $request->departement_name,
                'address_line' => $request->address_line,
                'city' => $request->city,
                'region' => $request->region,
                'zip_code' => $request->zip_code,
                'country' => null,
            ]);

            Session::flash('success', "Departement mis a jour avec succés");
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
        try{
            Departments::where('id',$id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success', 'Département supprimer avec succés');
        return redirect()->back();
    }
}

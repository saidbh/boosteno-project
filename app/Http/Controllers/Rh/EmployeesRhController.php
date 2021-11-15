<?php

namespace App\Http\Controllers\Rh;

use App\Http\Controllers\Controller;
use App\Models\Agencies;
use App\Models\Departments;
use App\Models\employees_type;
use App\Models\employees;
use App\Models\Teachers;
use App\Models\teachers_type;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EmployeesRhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employees::get();
        $employeeType = employees_type::get();
        $Agencys =  Agencies::get();
        $Depaprtements = Departments::get();
        $TeachersType = teachers_type::get();
        return view('rh.index',['employeeType' => $employeeType, 'Agencys' => $Agencys, 'Depaprtements' => $Depaprtements, 'TeachersType' => $TeachersType, 'employees' => $employees]);
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
        //
        $validator = Validator::make($request->all(),[
            'employee_type'=> 'bail|numeric|required',
            'agency_id'=> 'bail|required|numeric',
            'departement'=> 'bail|required|numeric',
            'first_name'=>'bail|required|string',
            'last_name'=> 'bail|required|string',
            'email'=> 'bail|required|string',
            'phone'=> 'bail|required|string',
            'gender'=> 'bail|required|string',
            'birthday'=> 'bail|required|date',
            'address'=> 'bail|required|string',
            'region'=> 'bail|required|string',
            'zip_code'=> 'bail|required|string',
            'country'=> 'bail|required|string',
            'level'=> 'bail|required_if:employee_type,==,1',
            'teacher_type' =>'bail|numeric|required_if:employee_type,==,1'
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try {
            //
            $employees = new employees();
            $employees->employees_type_id = $request->employee_type;
            $employees->agencies_id = $request->agency_id;
            $employees->departments_id = $request->departement;
            $employees->first_name = $request->first_name;
            $employees->last_name = $request->last_name;
            $employees->email = $request->email;
            $employees->phone = $request->phone;
            $employees->gender = $request->gender;
            $employees->birthday = $request->birthday;
            $employees->address_line = $request->address;
            $employees->region = $request->region;
            $employees->zip_code = $request->zip_code;
            $employees->country = $request->country;
            $employees->level = $request->level;
            //
            $employees->save();
            //
            if($request->employee_type == 1){
                $teacher = new teachers();
                $teacher->employees_id = $employees->id;
                $teacher->teachers_type_id = $request->teacher_type;
                $teacher->save();
            }
            }catch(QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();

            }
            return redirect()->back()->with('success','Employé ajouter !');
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
        //
                //
                $validator = Validator::make($request->all(),[
                    'employee_type'=> 'bail|numeric|required',
                    'agency_id'=> 'bail|required|numeric',
                    'departement'=> 'bail|required|numeric',
                    'first_name'=>'bail|required|string',
                    'last_name'=> 'bail|required|string',
                    'email'=> 'bail|required|string',
                    'phone'=> 'bail|required|string',
                    'gender'=> 'bail|required|string',
                    'birthday'=> 'bail|required|date',
                    'address'=> 'bail|required|string',
                    'region'=> 'bail|required|string',
                    'zip_code'=> 'bail|required|string',
                    'country'=> 'bail|required|string',
                    'level'=> 'bail|required_if:employee_type,==,1',
                    'teacher_type' =>'bail|numeric|required_if:employee_type,==,1'
                ]);

                if($validator->fails()){
                    Session::flash('error', $validator->errors()->first());
                    return redirect()->back()->withInput();
                }
                try {
                    //
                    employees::where('id', $id)->update([
                        'employees_type_id' => $request->employee_type,
                        'agencies_id' => $request->agency_id,
                        'departments_id' => $request->departement,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'gender' => $request->gender,
                        'birthday' => $request->birthday,
                        'address_line' => $request->address,
                        'region' => $request->region,
                        'zip_code' => $request->zip_code,
                        'country' => $request->country,
                        'level' => $request->level,
                    ]);
                    }catch(QueryException $e){
                        Session::flash('error', $e->getMessage());
                        return redirect()->back()->withInput();

                    }
                    return redirect()->back()->with('success','Employé mis a jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            employees::where('id', $id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success','Employé supprimer');
        return redirect()->back();
    }
}

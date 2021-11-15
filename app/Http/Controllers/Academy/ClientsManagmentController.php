<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientsManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Contacts::where('categories_type_id', 2)->get();
        return view('academy.clients.index',['clients' => $client]);
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
            'avatar'=> 'bail',
            'code_client'=> 'bail|required|string',
            'gender'=> 'bail|required|string',
            'firstname'=>'bail|required|string',
            'lastname'=> 'bail|required|string',
            'birthday'=> 'bail|required|date',
            'email'=> 'bail|required|email',
            'phone'=> 'bail|required|string|min:8',
            'address'=> 'bail|required|string',
            'country'=> 'bail|required|string',
            'city'=> 'bail|required|string',
            'zip_code'=> 'bail|required',
            'documents.*' =>'bail|file'

        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        //
        try {
            //
            $contacts = new Contacts();
            $contacts->categories_type_id = 2;
            $contacts->code_client = $request->code_client;
            $contacts->first_name= $request->firstname;
            $contacts->last_name= $request->lastname;
            $contacts->birthday = $request->birthday;
            $contacts->email= $request->email;
            $contacts->phone= $request->phone;
            $contacts->gender= $request->gender;
            $contacts->address_line= $request->address;
            $contacts->city= $request->city;
            $contacts->zip_code= $request->zip_code;
            $contacts->country= $request->country;
            $contacts->save();
            //
            $clients = new Clients();
            $clients->contacts_id = $contacts->id;
            $clients->save();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back()->with('success','client ajouter !');
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
        $validator = Validator::make($request->all(),[
            'avatar'=> 'bail',
            'gender'=> 'bail|required|string',
            'firstname'=>'bail|required|string',
            'lastname'=> 'bail|required|string',
            'birthday'=> 'bail|required|date',
            'email'=> 'bail|required|email',
            'phone'=> 'bail|required|string|min:8',
            'address'=> 'bail|required|string',
            'country'=> 'bail|required|string',
            'city'=> 'bail|required|string',
            'zip_code'=> 'bail|required',
            'documents.*' =>'bail|file'
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        //
        try {
            //
            Contacts::where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->lastname,
                'birthday' => $request->birthday,
                'email' => $request->email,
                'gender'=> $request->gender,
                'phone' => $request->phone,
                'address_line' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
            ]);
            //
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back()->with('success','client mis a jour !');
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
            Contacts::where('id', $id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success','client supprimer');
        return redirect()->back();
    }
}

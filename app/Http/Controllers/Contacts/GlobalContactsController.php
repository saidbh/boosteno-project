<?php

namespace App\Http\Controllers\Contacts;

use App\Models\Thirds;
use App\Models\Clients;
use App\Models\Contacts;
use App\Models\Prospects;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use App\Models\ThirdsCategories;
use App\Http\Controllers\Controller;
use App\Models\CategoriesType;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GlobalContactsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts = Contacts::get();
        $thirds = Thirds::get();
        return view('contacts.global.list', compact('contacts','thirds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thirds = Thirds::get();
        $categories = CategoriesType::get();
        return view('contacts.global.new', compact('thirds','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        if(!$request->has('contact_category')){
            Session::flash('error', 'Vous devez choisir une catégorie contact');
            return redirect()->back()->withInput();
        }

        $validator = Validator::make($request->all(),[
            'avatar'=> 'bail',
            'name'=> 'bail|required',
            'family'=> 'bail|required',
            'third'=>'bail',
            'gender'=> 'bail|required',
            'position'=> 'bail|required',
            'email'=> 'bail|required',
            'phone'=> 'bail|required',
            'address'=> 'bail|required',
            'city'=> 'bail|required',
            'zip_code'=> 'bail|required',
            'country'=> 'bail|required'
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try{
            $contacts = new Contacts();
            $contacts->thirds_id = $request->third;
            $contacts->categories_type_id = $request->contact_category;
            $contacts->code_client = $request->code_client;
            $contacts->code_supplier = $request->code_supplier;
            $contacts->first_name= $request->name;
            $contacts->last_name= $request->family;
            $contacts->position= $request->position;
            $contacts->email= $request->email;
            $contacts->phone= $request->phone;
            $contacts->gender= $request->gender;
            $contacts->address_line= $request->address;
            $contacts->city= $request->city;
            $contacts->zip_code= $request->zip_code;
            $contacts->country= $request->country;
            $contacts->save();
            $this->saveCategory($contacts->id,$request->all());
        }catch (QueryException $e){

            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();

        }
        return redirect()->route('contacts-list')->with('success','Contact ajouter !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contacts::find($id);
        $thirds = Thirds::get();
        return view('contacts.global.edit', compact('contact','thirds'));
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
        try{
            $thirds = Thirds::where('thirds_type_id', 2)->get();
            $contact = Contacts::where('id',$id)->first();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return view('contacts.global.update',compact('thirds','contact'));
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
            'avatar'=> 'bail',
            'name'=> 'bail|required',
            'family'=> 'bail|required',
            'third'=>'bail',
            'gender'=> 'bail|required',
            'position'=> 'bail|required',
            'email'=> 'bail|required',
            'phone'=> 'bail|required',
            'address'=> 'bail|required',
            'city'=> 'bail|required',
            'zip_code'=> 'bail|required',
            'country'=> 'bail|required'
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try{
            Contacts::where('id', $id)->update([
                'thirds_id' => $request->third,
                'first_name' => $request->name,
                'last_name' => $request->family,
                'position' => $request->position,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address_line' => $request->address,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
            ]);
        }catch (QueryException $e){

            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();

        }
        return redirect()->route('contacts-list')->with('success','Contact mis a jour !');
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
            Suppliers::where('contacts_id',$id)->delete();
            Prospects::where('contacts_id',$id)->delete();
            Clients::where('contacts_id',$id)->delete();
            Contacts::where('id', $id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success','Contact supprimer');
        return redirect()->back();
    }

    public function contactSwitch(Request $request)
    {
        try {
            Contacts::where('id',$request->id)->update(['categories_type_id'=>2]);
            Prospects::where('contacts_id',$request->id)->delete();
            Clients::firstOrCreate(['contacts_id'=>$request->id]);
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Tiers changer avec succés");
        return redirect()->route('contacts-list');

    }

    public function contactThirdAffect(Request $request){
        if($request->browser != null){
            try{
                $name =  trim($request->browser);
                $firstname = explode(" ",$name)[0];
                $lastname = explode(" ",$name)[1];
                $third = Thirds::where('name',$firstname)->where('alter_name',$lastname)->first();
                Contacts::where('id',$request->contactid)->update([
                    'thirds_id' => $third->id,
                ]);
            }catch (QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();
            }
            Session::flash('success', 'contact affecter avec succés');
            return redirect()->back();
        }else{
            Session::flash('error', 'Pas de contact selectionner');
            return redirect()->back()->withInput();
        }
    }

    public function contactProfile(Request $request, $id)
    {
        //
        try{
            $profile = Contacts::where('id',$id)->first();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return view('Contacts.profile.contactProfile', ['profile' => $profile]);
    }

    private function saveCategory($contact,$request)
    {
        try {
            switch ($request['contact_category']) {
                case 1:
                    $prospects = new Prospects();
                    $prospects->contacts_id = $contact;
                    $prospects->save();
                    break;
                case 2:
                    $clients = new Clients();
                    $clients->contacts_id = $contact;
                    $clients->save();
                    break;
                case 3:
                    $suppliers = new Suppliers();
                    $suppliers->contacts_id = $contact;
                    $suppliers->save();
                    break;
            }
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }
    }
}

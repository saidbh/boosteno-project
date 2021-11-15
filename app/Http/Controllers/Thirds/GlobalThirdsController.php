<?php

namespace App\Http\Controllers\Thirds;

use App\Models\User;
use App\Models\Thirds;
use App\Models\Clients;
use App\Models\Contacts;
use App\Models\Documents;
use App\Models\Prospects;
use App\Models\Suppliers;
use App\Models\ThirdsType;
use Illuminate\Http\Request;
use App\Models\ThirdsCategories;
use App\Http\Controllers\Controller;
use App\Models\CategoriesType;
use Facade\FlareClient\Http\Client;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GlobalThirdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thirds = Thirds::get();
        $contacts = Contacts::where('thirds_id', Null)->get();
        return view('thirds.global.list', compact('thirds','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriesType::get();
        $types = ThirdsType::get();
        return view('thirds.global.new',['categories'=>$categories,'types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('third_category')){
            Session::flash('error', 'Vous devez choisir une catégorie tier');
            return redirect()->back()->withInput();
        }

        if($request->third_type == 1){
            $validator = Validator::make($request->all(),[
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],[
                'firstname.required'=>'Nom est requis',
                'lastname.required'=>'Prénon est requis',
                'email.required'=>'Email est requis',
                'phone.required'=>'Téléphone est requis',
            ]);
        }

        if($request->third_type == 2){
            $validator = Validator::make($request->all(),[
                'company_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],[
                'company_name.required'=>'Nom de la société est requis',
                'email.required'=>'Email est requis',
                'phone.required'=>'Téléphone est requis',
            ]);
        }

        if($validator->fails()){
            Session::flash('error',$validator->errors()->first());
            return redirect()->back()->withInput();
        }

        if($request->third_type == 1){
            try {
                $contacts = new Contacts();
                $contacts->categories_type_id = $request->third_category;
                $contacts->code_client = $request->code_client;
                $contacts->code_supplier = $request->code_supplier;
                $contacts->first_name = $request->firstname;
                $contacts->last_name = $request->lastname;
                $contacts->email = $request->email;
                $contacts->phone = $request->phone;
                $contacts->gender = $request->gender;
                $contacts->birthday = $request->birthday;
                $contacts->address_line = $request->address;
                $contacts->city = $request->city;
                $contacts->country = $request->country;
                $contacts->zip_code = $request->zip_code;
                $contacts->save();
                $this->saveCategory(null,$contacts->id,$request->all());
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }

        if($request->third_type == 2){
            try {
                $thirds = new Thirds();
                $thirds->categories_type_id = $request->third_category;
                $thirds->code_client = $request->code_client;
                $thirds->code_supplier = $request->code_supplier;
                $thirds->name = $request->company_name;
                $thirds->alter_name = $request->company_altername;
                $thirds->email = $request->email;
                $thirds->phone = $request->phone;
                $thirds->tax_number = $request->company_tax_number;
                $thirds->address_line = $request->address;
                $thirds->city = $request->city;
                $thirds->country = $request->country;
                $thirds->zip_code = $request->zip_code;
                $thirds->save();
                $this->saveCategory($thirds->id,null,$request->all());
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }
        if($request->third_type == 1){
            Session::flash('success', "Tiers créer avec succés");
            return redirect()->route('contacts-list');
        }
        Session::flash('success', "Tiers créer avec succés");
        return redirect()->route('thirds-list');
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
        $third = Thirds::find($id);
        $types = ThirdsType::get();
        $categories = CategoriesType::get();
        return view('thirds.global.edit', compact('third','types','categories'));
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
        $this->setThirdContactCategory($request->third_category, $request->third_type, $id);
        if(!$request->has('third_category')){
            Session::flash('error', 'Vous devez choisir une catégorie tier');
            return redirect()->back()->withInput();
        }

        if($request->third_type == 1){
            $validator = Validator::make($request->all(),[
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],[
                'firstname.required'=>'Nom est requis',
                'lastname.required'=>'Prénon est requis',
                'email.required'=>'Email est requis',
                'phone.required'=>'Téléphone est requis',
            ]);
        }

        if($request->third_type == 2){
            $validator = Validator::make($request->all(),[
                'company_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],[
                'company_name.required'=>'Nom de la société est requis',
                'email.required'=>'Email est requis',
                'phone.required'=>'Téléphone est requis',
            ]);
        }

        if($validator->fails()){
            Session::flash('error',$validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try {
            Thirds::where('id', $id)->update([
                'categories_type_id' => $request->third_category,
                'name' => $request->company_name,
                'alter_name' => $request->company_altername,
                'address_line' => $request->address,
                'city' => $request->city,
                'region' => Null,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
                'phone' => $request->phone,
                'email' => $request->email,
                'tax_number' => $request->company_tax_number,
            ]);
            
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Client mise a jour avec succés");
        return redirect()->route('thirds-list');
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
            Contacts::where('thirds_id',$id)->update(['thirds_id'=>null]);
            Prospects::where('thirds_id',$id)->delete();
            Suppliers::where('thirds_id',$id)->delete();
            Clients::where('thirds_id',$id)->delete();
            Thirds::where('id',$id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success', 'Tier supprimer');
        return redirect()->back();

    }

    public function changeThird(Request $request)
    {
        try {
            Thirds::where('id',$request->id)->update(['categories_type_id'=>2]);
            Prospects::where('thirds_id',$request->id)->delete();
            Clients::firstOrCreate(['thirds_id'=>$request->id]);
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Tiers changer avec succés");
        return redirect()->back();

    }

    public function thirdContactAffect(Request $request)
    {
        if($request->browser != null){
            try{
                $name =  trim($request->browser);
                $firstname = explode(" ",$name)[0];
                $lastname = explode(" ",$name)[1];
                $contact = Contacts::where('first_name',$firstname)->where('last_name',$lastname)
                ->update([
                    'thirds_id'=>$request->thirdid
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


    public function thirdProfile(Request $request, $id)
    {
        //
        try{
            $profile = Thirds::where('id',$id)->first();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return view('thirds.profile.thirdProfile', ['profile' => $profile]);
    }

    public function updateThirds($id)
    {
        //
        try{
            $categories = CategoriesType::get();
            $types = ThirdsType::get();
            $third = Thirds::where('id',$id)->first();
        }catch(QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return view('thirds.global.update', ['third' => $third, 'categories'=>$categories,'types'=>$types]);

    }

    private function saveCategory($third,$contact,$request)
    {
        try {
            switch ($request['third_category']) {
                case 1:
                    $prospects = new Prospects();
                    $prospects->thirds_id = $third;
                    $prospects->contacts_id = $contact;
                    $prospects->save();
                    break;
                case 2:
                    $clients = new Clients();
                    $clients->thirds_id = $third;
                    $clients->contacts_id = $contact;
                    $clients->save();
                    break;
                case 3:
                    $suppliers = new Suppliers();
                    $suppliers->thirds_id = $third;
                    $suppliers->contacts_id = $contact;
                    $suppliers->save();
                    break;
            }
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }
    }

    private function saveimage()
    {
        /* if ($request->has('avatar'))
        {
            try{
                //one file start
                $Documents = new Documents();
                $Documents->thirds_id = $thirds->id;
                $fileName = time().'.'.$request->avatar->extension();
                Storage::putFileAs('public/files',$request->avatar,$fileName);
                Storage::setVisibility('public/files/'.$fileName,'public');
                $linklogo = Storage::url('public/files/'.$fileName);
                $Documents->path = $linklogo;
                $Documents->save();
                //one file end
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }

        try{
            $link = [];
            if($request->hasfile('documents'))
            {
                foreach($request->file('documents') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    Storage::putFileAs('public/files',$file,$name);
                    Storage::setVisibility('public/files/'.$name,'public');
                    $linkFile = Storage::url('public/files/'.$name);
                    array_push($link, $linkFile);
                }
                foreach ($link as $imgLink){
                    $doc = new Documents();
                    $doc->path = $imgLink;
                    $doc->thirds_id = $thirds->id;
                    $doc->save();
                }
            }

        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        } */
    }


    public function setThirdContactCategory($category, $type, $id)
    {
        try {
            switch ($category) {
                case 1:
                    if($type == 1) {
                        Prospects::firstOrCreate(['contacts_id' => $id]);
                        Clients::where('contacts_id',$id)->delete();
                        Suppliers::where('contacts_id',$id)->delete();
                    }else if($type == 2){
                        Prospects::firstOrCreate(['thirds_id' => $id]);
                        Clients::where('thirds_id',$id)->delete();
                        Suppliers::where('thirds_id',$id)->delete();
                    }
                    break;
                case 2:
                    if($type == 1) {
                        Prospects::where('contacts_id',$id)->delete();
                        Clients::firstOrCreate(['contacts_id' => $id]);
                        Suppliers::where('contacts_id',$id)->delete();
                    }else if($type == 2){
                        Prospects::where('thirds_id',$id)->delete();
                        Clients::firstOrCreate(['thirds_id' => $id]);
                        Suppliers::where('thirds_id',$id)->delete();
                    }
                    break;
                case 3:
                    if($type == 1) {
                        Prospects::where('contacts_id',$id)->delete();
                        Clients::where('contacts_id',$id)->delete();
                        Suppliers::firstOrCreate(['contacts_id' => $id]);
                    }else if($type == 2){
                        Prospects::where('thirds_id',$id)->delete();
                        Clients::where('thirds_id',$id)->delete();
                        Suppliers::firstOrCreate(['thirds_id' => $id]);
                    }
                    break;
            }
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\levels;
use App\Models\levels_type;


class LevelsManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $levels = levels::get();
        $levelsType = levels_type::get();
         return view('academy.levels.index',['levels' => $levels, 'levelsType' => $levelsType]);
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
            'Type_level'=> 'bail|required|numeric',
            'name_level'=> 'bail|required|string',
            'description'=> 'bail|nullable|text',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try {
            //
            $levels = new levels();
            $levels->levels_types_id = $request->Type_level;
            $levels->name = $request->name_level;
            $levels->description = $request->description;
            //
            $levels->save();
            }catch(QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();

            }
            return redirect()->back()->with('success','Niveau ajouter !');
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
            'name_level'=> 'bail|required|numeric',
            'name'=> 'bail|required|string',
            'description'=> 'bail|nullable|text',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try {
            //
            levels::where('id', $id)->update([
                'levels_types_id' => $request->name_level,
                'name' => $request->level_name,
                'description' => $request->description
            ]);
            //
            }catch(QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();

            }
            return redirect()->back()->with('success','Niveau ajouter !');
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
            levels::where('id', $id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success','Niveau supprimer');
        return redirect()->back();
    }
}

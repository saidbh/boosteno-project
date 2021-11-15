<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Classes;
use App\Models\Departments;
use App\Models\Lessons;
use App\Models\levels;

class ClassesManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::get();
        $departments = Departments::get();
        $levels = levels::get();
        //$rooms = Rooms::get();
        $lessens = Lessons::get();
        return view('academy.classes.index', ['classes' => $classes, 'departments' => $departments, 'levels' => $levels, 'lessens' => $lessens]);
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
            'departement'=> 'bail|nullable',
            'room'=> 'bail|nullable',
            'lesson'=> 'bail|nullable',
            'code_class'=>'bail|required|string',
            'name_class'=> 'bail|required|string',
            'capacity'=> 'bail|required|numeric',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try {
            //
            $classes = new Classes();
            $classes->rooms_id = $request->room;
            $classes->departments_id = $request->departement;
            $classes->lessons_id = $request->lesson;
            $classes->code_class = $request->code_class;
            $classes->name = $request->name_class;
            $classes->capacity = $request->capacity;
            //
            $classes->save();
            }catch(QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();

            }
            return redirect()->back()->with('success','Classe ajouter !');
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
                    'departement'=> 'bail',
                    'room'=> 'bail',
                    'lesson'=> 'bail',
                    'name_class'=> 'bail|required|string',
                ]);

                if($validator->fails()){
                    Session::flash('error', $validator->errors()->first());
                    return redirect()->back()->withInput();
                }
                try {
                    //
                    Classes::where('id',$id)->update([
                        'rooms_id' => $request->room,
                        'departments_id' => $request->departement,
                        'lessons_id' => $request->lesson,
                        'name' => $request->name_class,
                        'capacity' => $request->capacity
                    ]);
                    //
                    }catch(QueryException $e){
                        Session::flash('error', $e->getMessage());
                        return redirect()->back()->withInput();

                    }
                    return redirect()->back()->with('success','Classe mis a jour !');
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
            Classes::where('id', $id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success','classe supprimer');
        return redirect()->back();
    }
}

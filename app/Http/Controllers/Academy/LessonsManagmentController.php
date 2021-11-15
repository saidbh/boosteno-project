<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Lessons;
use App\Models\Teachers;
use App\Models\Sessions;
use App\Models\Lessons_type;
use App\Models\levels;
use App\Models\levels_type;

class LessonsManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = levels::get();
        $levels_type = levels_type::get();
        $lessens_type = Lessons_type::get();
        $sessions = Sessions::get();
        $teachers = Teachers::get();
        $Lessons = lessons::get();
        return view('academy.lessons.index', ['teachers' => $teachers, 'sessions' => $sessions,'lessens_type' => $lessens_type, 'levels' => $levels, 'Lessons' => $Lessons, 'levels_type' => $levels_type]);
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
            'Session'=> 'bail|nullable',
            'teacher_id'=> 'bail|nullable',
            'lessons_type_id'=> 'bail|required|numeric',
            'name_lesson'=>'bail|required|string',
            'description'=> 'bail|nullable|string',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try {
            //
            $Lessons = new Lessons();
            $Lessons->lessons_type_id = $request->Session;
            $Lessons->teachers_id = $request->teacher_id;
            $Lessons->session_id = $request->lessons_type_id;
            $Lessons->name = $request->name_lesson;
            $Lessons->description = null;
            //
            $Lessons->save();
            }catch(QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();

            }
            return redirect()->back()->with('success','Cour ajouter !');
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
            'Session'=> 'bail|nullable',
            'teacher_id'=> 'bail|nullable',
            'lessons_type_id'=> 'bail|required|numeric',
            'name_lesson'=>'bail|required|string',
            'description'=> 'bail|nullable|string',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        try {
            //
            Lessons::where('id',$id)->update([
                'lessons_type_id' => $request->lessons_type_id,
                'teachers_id' => $request->teacher_id,
                'session_id' => $request->Session,
                'name' => $request->name_lesson,
                'description' => $request->description,
            ]);
            //
            }catch(QueryException $e){
                Session::flash('error', $e->getMessage());
                return redirect()->back()->withInput();

            }
            return redirect()->back()->with('success','cour Modifier !');
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
            Lessons::where('id', $id)->delete();
        }catch (QueryException $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        Session::flash('success','Cour supprimer');
        return redirect()->back();
    }
}

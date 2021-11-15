<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Sessions;
use App\Models\Calendar;

class SessionsManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $session = Sessions::where('archived', 0)->get();
         return view('academy.sessions.index',['sessions' => $session]);
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
                //
                $validator = Validator::make($request->all(),[
                    'session'=> 'bail|string|required',
                    'Description'=> 'bail|required|string',
                    'start_date'=> 'bail|required|date',
                    'end_date'=>'bail|required|date',
                    'start_time'=> 'bail',
                    'end_time'=> 'bail',
                ]);

                if($validator->fails()){
                    Session::flash('error', $validator->errors()->first());
                    return redirect()->back()->withInput();
                }
                //
                try {
                    //
                    $Sessions = new Sessions();
                    $Sessions->name = $request->session;
                    $Sessions->description = $request->Description;
                    //
                    $Sessions->save();
                    }catch(QueryException $e){
                        Session::flash('error', $e->getMessage());
                        return redirect()->back()->withInput();

                    }
                    try {
                        //
                        $calandar = new Calendar();
                        $calandar->session_id = $Sessions->id;
                        $calandar->start_date = $request->start_date;
                        $calandar->end_date = $request->end_date;
                        $calandar->start_time = $request->start_time;
                        $calandar->end_time = $request->end_time;
                        //
                        $calandar->save();
                        }catch(QueryException $e){
                            Session::flash('error', $e->getMessage());
                            return redirect()->back()->withInput();

                        }
                    return redirect()->back()->with('success','Session ajouter !');
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
                            'session'=> 'bail|string|required',
                            'Description'=> 'bail|string',
                            'start_date'=> 'bail|required|date',
                            'end_date'=>'bail|required|date',
                            'start_time'=> 'bail',
                            'end_time'=> 'bail',
                        ]);

                        if($validator->fails()){
                            Session::flash('error', $validator->errors()->first());
                            return redirect()->back()->withInput();
                        }
                        //
                        try {
                            //
                            Sessions::where('id', $id)->update([
                                'name' => $request->session,
                                'description' => $request->Description,
                            ]);
                            //
                            }catch(QueryException $e){
                                Session::flash('error', $e->getMessage());
                                return redirect()->back()->withInput();

                            }
                            try {
                                //
                                Calendar::where('session_id', $id)->update([
                                    'start_date' => $request->start_date,
                                    'end_date' => $request->end_date,
                                    'start_time' => $request->start_time,
                                    'end_time' => $request->end_time,
                                ]);
                                //
                                }catch(QueryException $e){
                                    Session::flash('error', $e->getMessage());
                                    return redirect()->back()->withInput();

                                }
                            return redirect()->back()->with('success','Session mis a jour !');
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
        try {
            Sessions::where('id',$id)->Update([
                'archived' => 1
            ]);
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Session Archiver !");
        return redirect()->back()->withInput();
    }
}

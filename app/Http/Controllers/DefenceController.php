<?php

namespace App\Http\Controllers;

use App\defence;
use App\student;
use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DefenceController extends Controller
{

    public function index()
    {
        return view("headResponsable.defences")
            ->with("defences", defence::all())
            ->with("teachers", teacher::doesntHave('defence')->get())
            ->with("students", student::doesntHave('defence')->get());
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


    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'student1_id' => ['required'],
            'student2_id' => ['required'],
            'teacher_id' => ['required'],
            'date' => ['required', 'Date'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $defence = defence::create([
            'date' => $request['date'],
            'teacher_id' => $request['teacher_id'],
        ]);

        $s1 = student::find($request['student1_id']);
        $s1->defence_id = $defence->id;
        $s1->save();

        $s2 = student::find($request['student2_id']);
        $s2->defence_id = $defence->id;
        $s2->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\defence $defence
     * @return \Illuminate\Http\Response
     */
    public function show(defence $defence)
    {
        //
    }

    public function edit(defence $defence)
    {
        return view("headResponsable.defence")
            ->with("defence", $defence)
            ->with("teachers", teacher::all())
            ->with("students", student::all());
    }


    public function update(Request $request, defence $defence)
    {

        $defence->delete();

        $data = Validator::make($request->all(), [
            'student1_id' => ['required'],
            'student2_id' => ['required'],
            'teacher_id' => ['required'],
            'date' => ['required', 'Date'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $new_defence = defence::create([
            'date' => $request['date'],
            'teacher_id' => $request['teacher_id'],
        ]);

        $s1 = student::find($request['student1_id']);
        $s1->defence_id = $new_defence->id;
        $s1->save();

        $s2 = student::find($request['student2_id']);
        $s2->defence_id = $new_defence->id;
        $s2->save();

        return redirect()->route('defence.edit',["defence"=>$new_defence]);
    }


    public function destroy(defence $defence)
    {
        $defence->delete();

        return redirect()->back();
    }
}

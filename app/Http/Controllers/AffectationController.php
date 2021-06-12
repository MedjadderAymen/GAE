<?php

namespace App\Http\Controllers;

use App\affectation;
use App\defence;
use App\student;
use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create(defence $defence)
    {

        if ($defence->affectation){
            $teachers = teacher::where('id', "!=", $defence->teacher_id)
                ->with("department")
                ->where('department_id', $defence->teacher->department->id)
                ->get();

            return view("headResponsable.affectation")
                ->with("defence", $defence)
                ->with("teachers", $teachers);
        }else{
            $teachers = teacher::doesntHave('affectation')
                ->where('id', "!=", $defence->teacher_id)
                ->with("department")
                ->where('department_id', $defence->teacher->department->id)
                ->get();

            return view("headResponsable.affectation")
                ->with("defence", $defence)
                ->with("teachers", $teachers);
        }

    }

    public function store(Request $request, defence $defence)
    {
        $data = Validator::make($request->all(), [
            'president_id' => ['required'],
            'examiner_id' => ['required'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $affectation = $defence->affectation()->create([]);

        $president = teacher::find($request['president_id']);
        $president->affectation_id = $affectation->id;
        $president->save();

        $examiner = teacher::find($request['examiner_id']);
        $examiner->affectation_id = $affectation->id;
        $examiner->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\affectation $affectation
     * @return \Illuminate\Http\Response
     */
    public function show(affectation $affectation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\affectation $affectation
     * @return \Illuminate\Http\Response
     */
    public function edit(affectation $affectation)
    {
        //
    }


    public function update(Request $request, defence $defence)
    {
        $defence->affectation->delete();

        $data = Validator::make($request->all(), [
            'president_id' => ['required'],
            'examiner_id' => ['required'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $affectation = $defence->affectation()->create([]);

        $president = teacher::find($request['president_id']);
        $president->affectation_id = $affectation->id;
        $president->save();

        $examiner = teacher::find($request['examiner_id']);
        $examiner->affectation_id = $affectation->id;
        $examiner->save();

        return redirect()->back();

    }


    public function destroy(defence $defence)
    {
        $defence->affectation->delete();

        return redirect()->back();
    }
}

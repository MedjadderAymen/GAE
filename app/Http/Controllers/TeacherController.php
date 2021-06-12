<?php

namespace App\Http\Controllers;

use App\department;
use App\searchDomain;
use App\student;
use App\teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    public function index()
    {
        return view("headResponsable.teachers")
            ->with("teachers", teacher::all())
            ->with("search_domains", searchDomain::all())
            ->with("departments", department::all());
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'grade' => ['required', 'string', 'max:255'],
            'search_domains' => ['required',],
            'department_id' => ['required'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => "teacher",
        ]);

        $teacher = $user->teacher()->create([
            'grade' => $request['grade'],
            'department_id' => $request['department_id'],
        ]);

        $teacher->searchDomains()->attach($request['search_domains']);

        /*Mail::send('contact_email',
            array(
                'name' => $request['name'],
                'email' => $request['email'],
                'subject' => "Compte Soutencance",
                'content' => "vous trouvez ici vos information du compte",
            ), function($message) use ($request)
            {
                $message->from("gae@univ-constantine2.dz");
                $message->to($request['email']);
            });*/

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        //
    }

    public function edit(teacher $teacher)
    {
        return view("headResponsable.teacher")
            ->with("teacher", $teacher)
            ->with("search_domains", searchDomain::all())
            ->with("departments", department::all());
    }

    public function update(Request $request, teacher $teacher)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'grade' => ['required', 'string', 'max:255'],
            'search_domains' => ['required',],
            'department_id' => ['required'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $teacher->department_id = $request['department_id'];
        $teacher->grade = $request['grade'];

        $teacher->searchDomains()->sync($request['search_domains']);

        $teacher->save();

        $teacher->user->name = $request['name'];
        $teacher->user->email = $request['email'];

        if (empty($request['password'])) {
            $teacher->user->password = Hash::make($request['password']);
        }

        $teacher->user->save();


        return redirect()->back();
    }

    public function destroy(teacher $teacher)
    {
        $teacher->user->delete();

        return redirect()->back();
    }

}

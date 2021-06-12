<?php

namespace App\Http\Controllers;

use App\department;
use App\student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function index()
    {
        return view("all.students")->with("students", student::all())->with("departments", department::all());
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
            'birth_date' => ['required', 'date'],
            'serial_number' => ['required', 'string', 'max:255'],
            'inscription_number' => ['required', 'string', 'max:255'],
            'department_id' => ['required'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return redirect()->back();
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => "student",
        ]);

        $user->student()->create([
            'birth_date' => $request['birth_date'],
            'serial_number' => $request['serial_number'],
            'inscription_number' => $request['inscription_number'],
            'department_id' => $request['department_id'],
        ]);

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
     * @param \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }


    public function edit(student $student)
    {
        return view("all.student")->with("student", $student)->with("departments", department::all());
    }

    public function update(Request $request, student $student)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'serial_number' => ['required', 'string', 'max:255'],
            'inscription_number' => ['required', 'string', 'max:255'],
            'department_id' => ['required'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $student->department_id = $request['department_id'];
        $student->inscription_number = $request['inscription_number'];
        $student->serial_number = $request['serial_number'];
        $student->birth_date = $request['birth_date'];

        $student->save();

        $student->user->name = $request['name'];
        $student->user->email = $request['email'];

        if (empty($request['password'])) {
            $student->user->password = Hash::make($request['password']);
        }

        $student->user->save();


        return redirect()->back();


    }

    public function destroy(student $student)
    {
        $student->user->delete();

        return redirect()->back();
    }
}

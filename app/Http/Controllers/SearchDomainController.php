<?php

namespace App\Http\Controllers;

use App\searchDomain;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SearchDomainController extends Controller
{

    public function index()
    {
        return view("all.searchDomains")->with("search_domains",searchDomain::all());
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
            'domain' => ['required', 'string', 'max:255'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return redirect()->back();
        }

        searchDomain::create([
            'domain' => $request['domain'],
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\searchDomain  $searchDomain
     * @return \Illuminate\Http\Response
     */
    public function show(searchDomain $searchDomain)
    {
        //
    }


    public function edit(searchDomain $searchDomain)
    {
        return view("all.searchDomain")->with("searchDomain", $searchDomain);
    }

    public function update(Request $request, searchDomain $searchDomain)
    {
        $data = Validator::make($request->all(), [
            'domain' => ['required', 'string', 'max:255'],
        ]);

        if ($data->fails()) {

            Session::flash("error", $data->errors());
            return $data->errors();
        }

        $searchDomain->domain = $request['domain'];

        $searchDomain->save();

        return redirect()->back();
    }

    public function destroy(searchDomain $searchDomain)
    {
        $searchDomain->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoordonneeRequest;
use App\Models\Coordonnee;
use Illuminate\Http\Request;

class CoordonneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coordonnees = Coordonnee::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("formulaireInscription/coordonnees");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CoordonneeRequest $request)
    {
        session()->put("coordonnees", $request->all());
        //dd($request->all());
        return redirect()->route('createContacts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
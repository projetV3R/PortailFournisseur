<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentificationRequest;
use Illuminate\Http\Request;
use App\Models\ParametreSysteme;
class IdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       if (!auth()->check()) {
       // session()->flush();
        return view('formulaireInscription/identification');
    }

    return redirect()->back();

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(IdentificationRequest $request)
    {
       
        session()->put("identification", $request->all());

        return redirect()->route('createProduitsServices');
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

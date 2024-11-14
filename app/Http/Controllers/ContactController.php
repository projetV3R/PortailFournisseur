<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
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
        if (!auth()->check()  && session()->has('coordonnees') ){
        return View('formulaireInscription/contacts');
    }

    return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        if (!auth()->check()  && session()->has('coordonnees') ){
        $contacts = $request->input('contacts');
    
        session()->put('contacts', $contacts);
    
       
        return redirect()->route('createBrochuresCartesAffaires');
    }

    return redirect()->back();
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
    public function edit()
    {
      $fournisseur = Auth::user();
      return view("modificationCompte/contactModif" , compact('fournisseur'));
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoordonneeRequest;
use App\Models\Coordonnee;
use Illuminate\Http\Request;
use Log;

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
    // session()->flush();
        return view("formulaireInscription/coordonnees");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CoordonneeRequest $request)
    {
        Log::info('Test log message');

        session()->put("coordonnees", $request->all());
        $currentIndex = $request->input('currentIndex', 0);
        session()->put("currentIndex", $currentIndex);
        Log::info('Coordonnées enregistrées : ', $request->all());
        Log::info('Index enregistré : ' . $currentIndex);
  
      
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

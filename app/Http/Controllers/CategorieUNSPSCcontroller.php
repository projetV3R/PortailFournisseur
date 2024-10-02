<?php

namespace App\Http\Controllers;

use App\Models\CategorieUNSPSC;
use Illuminate\Http\Request;

use App\Models\Segment;
use App\Models\Family;
use App\Models\Classe;
use App\Models\Commodity;


class CategorieUNSPSCcontroller extends Controller
{
    public function index()
    {
        $segments = Segment::all();
        $families = Family::all(); 
        $classes = Classe::all();
        $commodities = Commodity::all();

        return view('categorie', compact('segments', 'families', 'classes', 'commodities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

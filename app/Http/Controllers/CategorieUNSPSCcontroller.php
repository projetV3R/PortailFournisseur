<?php

namespace App\Http\Controllers;

use App\Models\CategorieUNSPSC;
use App\Models\Classe;
use App\Models\Commodity;
use App\Models\Family;
use App\Models\Segment;
use Illuminate\Http\Request;

class CategorieUNSPSCcontroller extends Controller
{
    public function index()
    {
        $segments = Segment::All();
        //$families = Family::All(); $classes = Classe::All(); $commodities = Commodity::All();, 'families', 'classes', 'commodities'

        return view('categorie', compact('segments'));
    }

    public function getFamilies(Request $request)
    {
        $families = Family::whereHas('segments', function ($query) use ($request) {
            $query->where('segment', $request->segment);
        })->get();

        return response()->json($families);
    }

    public function getClasses(Request $request)
    {
        $classes = Classe::whereHas('families', function ($query) use ($request) {
            $query->where('family', $request->family); 
        })->get();

        return response()->json($classes);
    }

    public function getCommodities(Request $request)
    {
        $commodities = Commodity::whereHas('classes', function ($query) use ($request) {
            $query->where('class', $request->class);
        })->get();

        return response()->json($commodities);
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

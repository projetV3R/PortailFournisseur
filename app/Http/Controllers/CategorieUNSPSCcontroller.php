<?php

namespace App\Http\Controllers;

use App\Models\CategorieUNSPSC;
use Illuminate\Http\Request;

class CategorieUNSPSCcontroller extends Controller
{
    public function index()
    {
        $segments = CategorieUNSPSC::select('segment', 'segmentTitleFr')
            ->distinct()
            ->orderBy('segment')
            ->get();

        return view('categorie', compact('segments'));
    }

    public function getFamilies(Request $request)
    {
        $families = CategorieUNSPSC::select('family', 'familyTitleFr')
            ->where('segment', $request->segment)
            ->distinct()
            ->orderBy('family')
            ->get();

        return response()->json($families);
    }

    public function getClasses(Request $request)
    {
        $classes = CategorieUNSPSC::select('class', 'classTitleFr')
            ->where('segment', $request->segment)
            ->where('family', $request->family)
            ->distinct()
            ->orderBy('class')
            ->get();

        return response()->json($classes);
    }

    public function getCommodities(Request $request)
    {
        $commodities = CategorieUNSPSC::select('commodity', 'commodityTitleFr')
            ->where('segment', $request->segment)
            ->where('family', $request->family)
            ->where('class', $request->class)
            ->distinct()
            ->orderBy('commodity')
            ->get();

        return response()->json($commodities);
    }
    public function getProduits()
    {
        $produits = CategorieUNSPSC::orderBy('segment')
            ->orderBy('family')
            ->orderBy('class')
            ->get(['segment', 'segmentTitleFr', 'family', 'familyTitleFr', 'class', 'classTitleFr', 'commodity', 'commodityTitleFr']);

        return response()->json($produits);
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

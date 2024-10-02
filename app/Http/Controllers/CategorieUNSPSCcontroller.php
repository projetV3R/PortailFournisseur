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
        $families = Family::All();
        $classes = Classe::All();
        $commodities = Commodity::All();

        return view('categorie', compact('segments', 'families', 'classes', 'commodities'));
    }

    /*
    juste la bd unspsc

    public function getProduits()
    {
        $produits = CategorieUNSPSC::orderBy('segment')
            ->orderBy('family')
            ->orderBy('class')
            ->get(['segment', 'segmentTitleFr', 'family', 'familyTitleFr', 'class', 'classTitleFr', 'commodity', 'commodityTitleFr']);

        return response()->json($produits);
    }*/


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

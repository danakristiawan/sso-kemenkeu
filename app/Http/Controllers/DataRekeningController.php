<?php

namespace App\Http\Controllers;

use App\Models\DataRekening;
use Illuminate\Http\Request;

class DataRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataRekening::satker()->get();
        dd($data);
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
    public function show(DataRekening $dataRekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataRekening $dataRekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataRekening $dataRekening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataRekening $dataRekening)
    {
        //
    }
}

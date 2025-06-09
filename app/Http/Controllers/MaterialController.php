<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\MaterialType;
use App\Models\Unit;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        foreach ($materials as $material) {
            $material->quantity = $material->product->sum('quantity');
        }
        return view('materials.index', compact('materials'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Получаем список единицы измерения, типов партнера и отдаем представлению
        $units = Unit::all();
        $types = MaterialType::all();
        return view('materials.create', compact('units','types'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(MaterialRequest $request)
    {
        //
        $types = Material::create($request->validated());
        return redirect()->route('materials.index');
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
    public function edit(Material $material)
    {
        // Получаем все типы продукции и материалов для формы
        $units = Unit::all();
        $types = MaterialType::all();

        return view('materials.edit', compact('material', 'types', 'units'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, Material $material)
    {
        $material->update($request->validated());
        return redirect()->route('materials.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function products(string $id){

        // Загружаем продукты с информацией о количестве материала
        $material = Material::where('id', $id)->with('product')->first();
        return view('materials.product', compact('material'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try {
        $categorie=Categorie::all();
        return response()->json($categorie);
       } catch (\Exception $e) {
        return response()->json("probleme de récuperation de la liste des catégories") ;
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie=new Categorie([
                "nomcategorie"=> $request->input("nomcategorie"),
                "imagecategorie"=> $request->input("imagecategorie"),
            ]);
             $categorie->save();
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("insertion impossible") ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $categorie=Categorie::findOrfail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération des données") ;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categorie=Categorie::findOrfail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("probleme de modification") ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categorie=Categorie::findOrfail($id);
            $categorie->delete();
            return response()->json("catégorie surprimée avec succes") ;
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de catégorie") ;
        }
    }
}

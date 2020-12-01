<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkmnData = Pokemon::all();
        return view('pages.index', compact('pkmnData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeData = Type::all();
        return view('pages.createPkmn', compact('typeData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $request->validate([
           'name'=>'required|max:20',
           'level'=>'required|min:1|max:100',
           'type_id'=>'required',
           'src'=>'required'
       ]);
        $newPkmn = new Pokemon;
        $newPkmn->name = $request->name;
        $newPkmn->level = $request->level;
        $newPkmn->type_id = $request->type_id;
        $newPkmn->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('images', 'public');
        $newPkmn->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newPkmn = Pokemon::find($id);
        return view('pages.showPkmn', compact('newPkmn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeData = Type::all();
        $newPkmn = Pokemon::find($id);
        return view('pages.editPkmn', compact('newPkmn', 'typeData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newPkmn = Pokemon::find($id);
        $newPkmn->name = $request->name;
        $newPkmn->level = $request->level;
        $newPkmn->type_id = $request->type_id;
        Storage::disk('public')->delete('images/'.$newPkmn->src);
        $newPkmn->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('images', 'public');
        $newPkmn->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newPkmn = Pokemon::find($id);
        $newPkmn->delete();
        return redirect('/');
    }
}

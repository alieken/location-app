<?php

namespace App\Http\Controllers;

use App\Models\Konum;
use Illuminate\Http\Request;

class KonumController extends Controller
{
    public function add(){
        return view('konum.add');
    }

    public function liste(){
        $table = Konum::orderBy("id", "desc")->get();

        return view('konum.liste', ["table" => $table]);
    }

    public function show($id){
        $veri = Konum::findOrFail($id);

        return view('konum.show', ["veri" => $veri]);
    }

    public function edit($id){
        $veri = Konum::findOrFail($id);

        return view('konum.edit', ["veri" => $veri]);
    }

    public function konum($id){
        $veri = Konum::findOrFail($id);

        return view('konum.konum', ["veri" => $veri]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "konumAd" => 'required|string|max:255',
            "enlem" => 'required|string|max:255',
            "boylam" => 'required|string|max:255',
            "renk" => 'required|string|max:255',
        ]);

        $validated["renk"] = str_replace("#", "",  $validated["renk"]);

        Konum::create($validated);

        return redirect()->route('konums.liste');
    }

    public function edit_done(Request $request){

        $validated = $request->validate([
            "konumAd" => 'required|string|max:255',
            "enlem" => 'required|string|max:255',
            "boylam" => 'required|string|max:255',
            "renk" => 'required|string|max:255',
        ]);

        $validated["renk"] = str_replace("#", "",  $validated["renk"]);

        $id = $request->id;
        Konum::whereId($id)->update($validated);
        return redirect()->route('konums.liste');
    }

    public function delete($id){

        $etk = Konum::findOrFail($id);
        $etk->delete();
        return redirect()->route('konums.liste');
    }
}

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

    function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
      
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
          pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
      
        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
      }

    public function konum($id){
        $veri = Konum::findOrFail($id);

        return view('konum.konum', ["veri" => $veri]);
    }

    public function rota($id){
        $veri = Konum::findOrFail($id);

        $table = Konum::where("id", "!=", $id)->orderBy("id", "desc")->get();

        $table2 = Konum::where("id", "!=", $id)->orderBy("id", "desc")->get()->toArray();
        $rotalar = array();

        $lat = $veri->enlem;
        $lng = $veri->boylam;
        array_push($rotalar, [$lat, $lng]);
        $ind = 0;
        $ekle_ind = "";

       
        while(count($table2) != 0){
            $ind = 0;
            $hesapla = 9E18;

            foreach ($table2 as $tb) {
                $hesapla_lat = $table2[$ind]["enlem"];
                $hesapla_lng = $table2[$ind]["boylam"];

                
                $uzunluk = $this->vincentyGreatCircleDistance($lat, $lng, $hesapla_lat, $hesapla_lng);
                //echo "lat1 : " . $lat . " lon1 : " . $lng . " hesaplatlat : " . $hesapla_lat . " hesaplalng : " . $hesapla_lng . " uzunluk : " . $uzunluk . " hesapla : " . $hesapla . " ad : " . $table2[$ind]["konumAd"] . "<br><br>";
                if(floatval($uzunluk) < $hesapla){
                    $ekle_ind = $ind;
                    $hesapla = floatval($uzunluk);
                }
                $ind++;
            }
            $lat = $table2[$ekle_ind]["enlem"];
            $lng = $table2[$ekle_ind]["boylam"];
            array_push($rotalar, [$table2[$ekle_ind]["enlem"], $table2[$ekle_ind]["boylam"]]);
            array_splice($table2, $ekle_ind, 1);
        }

        return view('konum.rota', ["veri" => $veri, "table" => $table, "rota" => $rotalar]);
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

<?php

namespace App\Http\Controllers;

use App\Totem;
use Illuminate\Http\Request;
use App\Camera;
use App\Headquarter;
use App\Picture;
use App\Ultrasound;

class TotemController extends Controller
{
  public function index()
  {
    $totem = Totem::all();
    return view('/admin/showtotem', ['totems' => $totem ]);
  }

  public function create()
  {
      $camera       = Camera::all();
      $headquarter  = Headquarter::all();
      $picture      = Picture::all();
      $ultrasound   = Ultrasound::all();

      return view('/admin/showtotems', ['cameras' => $camera, 'headquarters' => $headquarter, 'pictures' => $picture, 'ultrasounds' => $ultrasound]);
  }

  public function store(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();
        date_default_timezone_set('America/Santiago');
        $response = Totem::create([
          'number_of'       => $data["number_of"],
          'floor'           => $data["floor"],
          'headquarter_id'  => $data["headquarter_id"],
          'ultrasound_id'   => $data["ultrasound_id"],
          'camera_id'       => $data["camera_id"],
          'picture_id'      => $data["picture_id"],
        ]);
        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function stored(Request $request)
  {

        $request->validate([
            'Nombre' => 'required|unique:totems,number_of',
            'Piso' => 'required',
            'Sede' => 'required',
            'Pintura' => 'required',
            'Camara' => 'required',
            'Ultrasonido' => 'required',
          ]);

        $totem = new Totem;
        $totem->number_of = $request['Nombre'];
        $totem->floor = $request['Piso'];
        $totem->headquarter_id = $request['Sede'];
        $totem->picture_id = $request['Pintura'];
        $totem->camera_id = $request['Camara'];
        $totem->ultrasound_id = $request['Ultrasonido'];
        $totem->save();

        return redirect()->back()->with('success', 'El tótem se ha agregado correctamente.');
  }

  public function show(Request $request)
  {
      //
  }

  public function showed($id){

    $totems = Totem::find($id);

    $camera       = Camera::all();
    $headquarter  = Headquarter::all();
    $picture      = Picture::all();
    $ultrasound   = Ultrasound::all();

    return view('/admin/editotems', ['totems' => $totems, 'cameras' => $camera, 'headquarters' => $headquarter, 'pictures' => $picture, 'ultrasounds' => $ultrasound]);

  }

  public function edit(Request $request)
  {
      //
  }

  public function update(Request $request)
    {
      $totem = Totem::find($request['id']);
      $totem->number_of = $request['number_of'];
      $totem->floor = $request['floor'];
      $totem->headquarter_id = $request['headquarter'];
      $totem->picture_id = $request['picture'];
      $totem->camera_id = $request['camera'];
      $totem->ultrasound_id = $request['ultrasound'];
      $totem->save();

      return redirect('/show/totem')->with('success', 'El tótem ha editado correctamente.');
    }

  public function destroy($id)
  {
    $destroy = Totem::destroy($id);
    return redirect('/show/totem')->with('success','El tótem se ha eliminado correctamente.');
  }
}

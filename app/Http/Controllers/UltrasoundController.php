<?php

namespace App\Http\Controllers;

use App\Ultrasound;
use Illuminate\Http\Request;

class UltrasoundController extends Controller
{
  public function index()
  {
      $ultrasounds = Ultrasound::all();
      return view('/admin/showultrasounds', ['ultrasounds' => $ultrasounds]);
  }

  public function create()
  {
      return view('/admin/showultrasound');
  }

  public function store(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();
        date_default_timezone_set('America/Santiago');
        $response = Ultrasound::create([
          'number_of' => $data["number_of"]
        ]);
        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function stored(Request $request)
  {

    $request->validate([
        'Nombre' => 'required|unique:ultrasounds,number_of',
      ]);

    $ultrasound = new Ultrasound;
    $ultrasound->number_of = $request['Nombre'];
    $ultrasound->save();

    return redirect('/add/ultrasonido')->with('success', 'El ultrasonido se ha agregado correctamente.');

  }

  public function show($id)
  {
      $ultrasound = Ultrasound::find($id);
      return view('/admin/editultrasound', ['ultrasounds' => $ultrasound]);
  }

  public function edit(Request $request)
  {
      //
  }

  public function update(Request $request)
  {
      $update = Ultrasound::find($request['uid']);
      $update->number_of = $request['number_of'];
      $update->save();

      return redirect('/show/ultrasonidos')->with('success', 'El ultrasonido se ha editado correctamente');
  }

  public function destroy($id)
  {
    $destroy = Ultrasound::destroy($id);
    return redirect('/show/ultrasonidos')->with('success','El cuadro se ha eliminado correctamente.');
  }

}

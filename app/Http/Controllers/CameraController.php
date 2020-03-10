<?php

namespace App\Http\Controllers;

use App\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
  public function index()
  {
    $cameras = Camera::all();
    return view('/admin/showcamera', ['cameras' => $cameras]);
  }

  public function create()
  {
      return view('/admin/showcameras');
  }

  public function store(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();
        date_default_timezone_set('America/Santiago');
        $response = Camera::create([
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
        'Nombre' => 'required|unique:cameras,number_of',
      ]);

      $cameras = New Camera;
      $cameras->number_of = $request['Nombre'];
      $cameras->save();

      return redirect('/show/camaras')->with('success', 'La cámara se ha agregado correctamente.');
  }

  public function show(Request $request, $id)
  {
    if($request->isJson()){
      $response = Camera::all();
      if(strlen($response) == 2){
        return response() -> json(['accepted' => 'No Content'],204);
      }else{
        return response() -> json($response,201);
      }
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function showed($id)
  {
    $cameras = Camera::find($id);
    return view('/admin/editcameras', ['cameras' => $cameras]);
  }

  public function edit(Request $request)
  {
      //
  }

  public function update(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();
        date_default_timezone_set('America/Santiago');
        $response = Camera::find($data["id"])->update([
          'number_of' => $data["number_of"]
        ]);
        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function updated(Request $request)
  {
    $update = Camera::find($request['cid']);
    $update->number_of = $request['number_of'];
    $update->save();

    return redirect('/show/camaras')->with('success', 'La cámara se ha editado correctamente.');
  }

  public function destroy($id)
  {
    $destroy = Camera::destroy($id);
    return redirect('/show/camaras')->with('success','El cámara se ha eliminado correctamente.');
  }
}

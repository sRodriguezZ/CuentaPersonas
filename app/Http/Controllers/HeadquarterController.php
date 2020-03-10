<?php

namespace App\Http\Controllers;

use App\Headquarter;
use Illuminate\Http\Request;

class HeadquarterController extends Controller
{
  public function index()
  {
      //
  }

  public function create()
  {
      //
  }

  public function store(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();
        date_default_timezone_set('America/Santiago');
        $response = Headquarter::create([
          'number_of' => $data["number_of"],
          'region'    => $data["region"],
          'city'      => $data["city"],
          'adress'    => $data["adress"]
        ]);
        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function show(Request $request)
  {
    if($request->isJson()){
      $response = Headquarter::all();
      if(strlen($response) == 2){
        return response() -> json(['accepted' => 'No Content'],204);
      }else{
        return response() -> json($response,201);
      }
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
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
          'number_of' => $data["number_of"],
          'region' => $data["region"],
          'city' => $data["city"],
          'adress' => $data["adress"]
        ]);
        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function destroy(Request $request)
  {
      //
  }
}

<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;

use App\Reading;
use App\Totem;
use App\Picture;
use Illuminate\Http\Request;
use DateTime;

class ReadingController extends Controller
{

  public function pdfList()
  {
      

      $init_date = new DateTime();
      $init_date->modify('first day of this month');
      $init_date->format('Y/m/d');

      $end_date = new DateTime();
      $end_date->modify('last day of this month');
      $end_date->format('Y/m/d');
      $totemResponse = Totem::all();
      $i=0;
      $totalUlt = 0;
      $totalCam = 0;
      foreach ($totemResponse as $key => $value) {
        $pictureResponse    = Picture::where('id', $value->picture_id)
                                     ->first();
        $ultrasoundResponse = Reading::where('totem_id', $value->id)
                                      ->whereBetween('created_at', [$init_date, $end_date])
                                     ->sum('value_of_ultrasound');
        $cameraResponse = Reading::where('totem_id', $value->id)
                                  ->whereBetween('created_at', [$init_date, $end_date])
                                     ->sum('value_of_camera');
        if($ultrasoundResponse>0 || $cameraResponse>0){
          $picture[$i] =
          array(
            'author'      => $pictureResponse['author'],
            'name'        => $pictureResponse['name'],
            'ultrasound'  =>intval($ultrasoundResponse),
            'camera'      =>intval($cameraResponse)
          );
          $totalUlt += intval($ultrasoundResponse);
          $totalCam += intval($cameraResponse);
          $i++;
      }
      }

      $picture[$i]=
      array(
        'author'      =>' ',
        'name'        => 'Promedio',
        'ultrasound'  =>round($totalUlt/$i-1),
        'camera'      =>round($totalCam/$i-1)
      );
      $i++;
      $picture[$i]=array('author'=>' ','name' => "Total", 'ultrasound'=>$totalUlt, 'camera'=>$totalCam);;
      $json = json_encode($picture);
      $json = json_decode($json);
      $pdf = PDF::loadView('pdf.view_on_table', compact('json'));
      return $pdf->download('listado.pdf');
  }
  public function pdfRank()
  {
    $init_date = new DateTime();
    $init_date->modify('first day of this month');
    $init_date->format('Y/m/d');

    $end_date = new DateTime();
    $end_date->modify('last day of this month');
    $end_date->format('Y/m/d');
      $totemResponse = Totem::all();
      $i=0;
      foreach ($totemResponse as $key => $value) {
        $pictureResponse    = Picture::where('id', $value->picture_id)
                                     ->first();
        $cameraResponse = Reading::where('totem_id', $value->id)
                                 ->whereBetween('created_at', [$init_date, $end_date])
                                 ->sum('value_of_camera');
      if($cameraResponse>0){
        $picture[$i] =
        array(
          'author'      =>$pictureResponse['author'],
          'name'        => $pictureResponse['name'],
          'camera'      => intval($cameraResponse)
        );
        $i++;
      }
      }

      $json = json_encode($picture);
      $json = json_decode($json);
      usort($json, function($a, $b) { //Sort the array using a user defined function
          return $a->camera > $b->camera ? -1 : 1; //Compare the scores
      });
      $pdf = PDF::loadView('pdf.view_on_rank', compact('json'));
      return $pdf->download('ranking.pdf');
  }

  public function create()
  {
      //
  }

  public function storeCamera(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();

        $query = Totem::where('camera_id', $data["camera_id"])->first();
        date_default_timezone_set('America/Santiago');

        $response = Reading::create([
          'value_of_ultrasound'   => $data["value_of_ultrasound"],
          'value_of_camera'       => $data["value_of_camera"],
          'totem_id'              => $query['id']
        ]);

        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }
  public function storeUltrasound(Request $request)
  {
    if($request->isJson()){
        $data = $request->json()->all();

        $query = Totem::where('ultrasound_id', $data["ultrasound_id"])->first();
        date_default_timezone_set('America/Santiago');

        $response = Reading::create([
          'value_of_ultrasound'   => $data["value_of_ultrasound"],
          'value_of_camera'       => $data["value_of_camera"],
          'totem_id'              => $query['id']
        ]);

        return response() -> json($response,201);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }
  public function show(Request $request)
  {
      //
  }

  public function edit(Request $request)
  {
      //
  }

  public function update(Request $request)
  {
      //
  }

  public function destroy(Request $request)
  {
      //
  }
}

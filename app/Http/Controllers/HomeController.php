<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;

use App\Reading;
use App\Totem;
use App\Picture;
use Illuminate\Http\Request;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

      $init_date = new DateTime();
      $init_date->modify('first day of this month');
      $init_date->format('Y/m/d');

      $end_date = new DateTime();
      $end_date->modify('last day of this month');
      $end_date->format('Y/m/d');

      $totemResponse = Totem::all();
      $i  = 0;
      $pictureArray[$i]=['Pintura', 'Visitas', 'Vistas'];
      $pictureArrayTable[$i]=['Autor','Pintura', 'Visitas', 'Vistas'];
      $i++;
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
          $pictureArrayTable[$i] =
          [
            $pictureResponse['author'],
            $pictureResponse['name'],
            intval($ultrasoundResponse),
            intval($cameraResponse)
          ];

          $pictureArray[$i] =
          [
            $pictureResponse['name'],
            intval($ultrasoundResponse),
            intval($cameraResponse)
          ];
          $totalUlt += intval($ultrasoundResponse);
          $totalCam += intval($cameraResponse);
          $i++;

        }
      }

      $pictureArrayTable[$i]=[' ','Promedio', round($totalUlt/$i-1), round($totalCam/$i-1)];
      $i++;
      $pictureArrayTable[$i]=[' ','Total', $totalUlt, $totalCam];


      return view('home')->with('picture',json_encode($pictureArray))
                          ->with('pictable',json_encode($pictureArrayTable));
    }

    public function welcome() {
      return view('welcome');
    }

    public function reportes() {
        return view('/admin/reportes');
    }
}

<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use DB;

class PictureController extends Controller
{
  public function index(Request $request)
  {
      $pictures = Picture::all();
      return view('/admin/showpictures', ['pictures' => $pictures]);
  }

  public function create()
  {
    return view('/admin/showpicture');
  }

  public function store(Request $request)
  {

    $request->validate([
        'autor' => 'required',
        'nombreobra' => 'required|unique:pictures,name',
      ]);

      $insert = new Picture;
      $insert->author = $request['autor'];
      $insert->name = $request['nombreobra'];
      $insert->save();

      return redirect('/add/cuadro')->with('success','La obra se ha agregado correctamente.');
  }

  public function show($id)
  {
      $pictures = DB::table('pictures')->where('id', $id)->first();
      return view('/admin/editpicture', ['pictures' => $pictures]);
  }

  public function edit(Request $request)
  {

  }

  public function update(Request $request)
  {
    $pictures = Picture::find($request['id']);
    $pictures->author = $request['author'];
    $pictures->name = $request['nombreobra'];
    $pictures->save();

    return redirect('/show/cuadros')->with('success','La obra se ha editado correctamente.');

  }

  public function destroy($id)
  {
      $destroy = Picture::destroy($id);
      return redirect('/show/cuadros')->with('success','La obra se ha eliminado correctamente.');
  }
}

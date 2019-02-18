<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mobil;

class ControllerMobil extends Controller
{
  public function mobil()
  {
    if (Auth::user())
    {
      $page = 'datamobil';
      $data = Mobil::all();
      return view($page)->with(compact('data'));
    }
    return view('auth.login');
  }

  public function addMobil()
  {
    if(Auth::user())
    {
      return view('addmobil');
    }
    return view('auth.login');
  }

  public function createMobil(Request $request){
      $this->validate($request, [
        'platno'   => 'required',
      ]);

        $data = new Mobil();
        $data->platno = $request->get('platno');
        $data->save();
        return redirect()->route('data.mobil')->with('alert','Data berhasil ditambahkan!');
  }

  public function deleteMobil($id)
  {
    $deleteMobil = Mobil::findOrFail($id);
    $deleteMobil->delete();
    return redirect()->route('data.mobil')->with('alert','Data berhasil dihapus!');
  }

  public function editMobil($id)
  {
    if(Auth::user())
    {
      $page = 'editmobil';
      $editMobil = Mobil::findOrFail($id);
      return view($page)->with(compact('editMobil'));
    }
    return view('auth.login');

  }

  public function updateMobil(Request $request, $id)
  {
    $updateMobil = Mobil::findOrFail($id);
    $updateMobil->platno = $request->platno;
    $success = $updateMobil->save();
    if ($success) {
      // return success
      return redirect()->route('data.mobil')->with('alert','Data berhasil diubah!');
    }
    else {
      // returm failed
      return redirect()->route('edit.mobil')->with('alert','Data tidak berhasil diubah!');
    }
  }
}

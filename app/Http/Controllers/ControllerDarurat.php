<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Darurat;
use App\Kategori;
class ControllerDarurat extends Controller
{
  public function darurat()
  {
    if (Auth::user()) {
      $page = 'datadarurat';
      $data = Darurat::with('Kategori')->get();
      return view($page)->with(compact('data'));
    }
    return view('auth.login');
  }

  public function addDarurat()
    {
      if (Auth::user())
      {
        $page = 'adddarurat';
        $kategoris = Kategori::all();
        return view($page)->with(compact('kategoris'));
      }
      return view('auth.login');
    }

    public function createDarurat(Request $request)
        {
          $this->validate($request, [
            'name'   => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
          ]);
            $data = new Darurat();
            $data->name = $request->get('name');
            $data->keterangan = $request->get('keterangan');
            $data->kategori_id = $request->get('kategori_id');
            $data->save();
            return redirect()->route('data.darurat')->with('alert-success','Data berhasil ditambahkan!');
        }
        public function deleteDarurat($id)
        {
          $deleteDarurat = Darurat::findOrFail($id);
          $deleteDarurat->delete();
          return redirect()->route('data.darurat')->with('alert','Data berhasil dihapus!');
        }

        public function editDarurat($id)
        {
          if(Auth::user())
          {
            $page = 'editdarurat';
            $editDarurat = Darurat::findOrFail($id);
            $kategoris = Kategori::all();
            return view($page)->with(compact('editDarurat','kategoris'));
          }
          return view('auth.login');

        }

        public function updateDarurat(Request $request, $id)
        {
          $updateDarurat = Darurat::findOrFail($id);
          $updateDarurat->name = $request->name;
          $updateDarurat->keterangan = $request->keterangan;
          $updateDarurat->kategori_id = $request->kategori_id;
          $success = $updateDarurat->save();
          if ($success) {
            // return success
            return redirect()->route('data.darurat')->with('alert','Data berhasil diubah!');
          }
          else {
            // returm failed
            return redirect()->route('edit.darurat')->with('alert','Data tidak berhasil diubah!');
          }
        }
}

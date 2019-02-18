<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kategori;
class ControllerKategori extends Controller
{
    public function kategori()
    {
      if (Auth::user())
      {
        $page = 'datakategori';
        $data = Kategori::all();
        return view($page)->with(compact('data'));
      }
      return view('auth.login');
    }

    public function addkategori()
    {
      if(Auth::user())
      {
        return view('addkategori');
      }
      return view('auth.login');
    }

    public function createKategori(Request $request){
        $this->validate($request, [
          'name'   => 'required',
        ]);

          $data = new Kategori();
          $data->name = $request->get('name');
          $data->save();
          return redirect()->route('data.kategori')->with('alert','Data berhasil ditambahkan!');
    }

    public function deleteKategori($id)
    {
      $deleteKetegori = Kategori::findOrFail($id);
      $deleteKetegori->delete();
      return redirect()->route('data.kategori')->with('alert','Data berhasil dihapus!');
    }

    public function editKategori($id)
    {
      if(Auth::user())
      {
        $page = 'editkategori';
        $editKategori = Kategori::findOrFail($id);
        return view($page)->with(compact('editKategori'));
      }
      return view('auth.login');

    }

    public function updateKategori(Request $request, $id)
    {
      $updateKategori = Kategori::findOrFail($id);
      $updateKategori->name = $request->name;
      $success = $updateKategori->save();
      if ($success) {
        // return success
        return redirect()->route('data.kategori')->with('alert','Data berhasil diubah!');
      }
      else {
        // returm failed
        return redirect()->route('edit.kategori')->with('alert','Data tidak berhasil diubah!');
      }
    }
}

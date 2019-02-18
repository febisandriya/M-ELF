<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Supir;
use App\Mobil;
class ControllerSupir extends Controller
{

    public function supir()
    {
      if (Auth::user()) {
        $page = 'datasupir';
        $data = Supir::with('Mobil')->get();
        return view($page)->with(compact('data'));
      }
      return view('auth.login');
    }

    public function addSupir()
      {
        if (Auth::user())
        {
          $page = 'addsupir';
          $mobils = Mobil::all();
          return view($page)->with(compact('mobils'));
        }
        return view('auth.login');
      }

      public function createSupir(Request $request)
      {
        $this->validate($request, [
        'name'   => 'required',
        'username' => 'required',
        'password' => 'required|min:8',
        'mobil_id' => 'required',
        ]);

        $password = $request->get('password');
        $data = new Supir;
        $data->name = $request->get('name');
        $data->username = $request->get('username');
        $data->password = md5($password);
        $data->mobil_id = $request->get('mobil_id');
        $data->save();
        return redirect()->route('data.supir')->with('alert-success','Data berhasil ditambahkan!');
        }

      public function deleteSupir($id)
      {
        $deleteSupir = Supir::findOrFail($id);
        $deleteSupir->delete();
        return redirect()->route('data.supir')->with('alert','Data berhasil dihapus!');
      }

      public function editSupir($id)
      {
        if(Auth::user())
        {
          $page = 'editsupir';
          $editSupir = Supir::findOrFail($id);
          $mobils = Mobil::all();
          return view($page)->with(compact('editSupir','mobils'));
        }
        return view('auth.login');

      }

      public function updateSupir(Request $request, $id)
      {
        $updateSupir = Supir::findOrFail($id);
        $password = $request->password;
        $updateSupir->name = $request->name;
        $updateSupir->username = $request->username;
        $updateSupir->password = bcrypt($password);
        $updateSupir->mobil_id = $request->mobil_id;
        $success = $updateSupir->save();
        if ($success) {
          // return success
          return redirect()->route('data.supir')->with('alert','Data berhasil diubah!');
        }
        else {
          // returm failed
          return redirect()->route('edit.supir')->with('alert','Data tidak berhasil diubah!');
        }
      }
}

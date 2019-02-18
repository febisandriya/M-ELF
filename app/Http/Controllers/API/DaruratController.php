<?php

namespace App\Http\Controllers\API;

use App\Darurat;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaruratController extends Controller
{
        public function uploads(Request $request)
          {
              $data = new Darurat();
              $data->kategori_id = $request->input('kategori_id');
              $data->keterangan = $request->input('keterangan');
              $file = $request->file('gambar');
              $ext = $file->getClientOriginalExtension();
              $newName = rand(100000,1001238912).".".$ext;
              $file->move('uploads/gambar',$newName);
              $data->gambar = $newName;
              $data->save();
              if ($data->save())
              {
                $res['status'] = true;
                $res['code'] = 200;
                $res['message'] = "Berhasil  !";
                return response($res);
              }
              else
              {
                $res['status'] = false;
                $res['code'] = 400;
                $res['message'] = "Gagal !!!";
                return response($res);

              }
          }
}

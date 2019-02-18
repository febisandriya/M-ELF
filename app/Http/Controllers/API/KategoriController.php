<?php

namespace App\Http\Controllers\API;

use App\Darurat;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
  public function kategori()
{
    //
    $data = Kategori::all();

  if(count($data) > 0){ //mengecek apakah data kosong atau tidak
    $res['status'] = true;
    $res['code'] = 200;
    $res['message'] = "Success!";
    $res = $data;
      return response($res);
  }
  else{
      $res['message'] = "Empty!";
      return response($res);
  }
}
}

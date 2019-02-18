<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supir;
class LoginController extends Controller
{
  public function dologin(Request $request)
  {
    $this->validate($request, [
        $user = $request->input('username'),
        $pass = $request->input('password')
        ]);

    $passencrypt = md5($pass);

    $data = Supir::where('username',$user)->where('password',$passencrypt)->first();
    if (count($data) > 0)
    {
      $res['status'] = true;
      $res['code'] = 200;
      $res['message'] = "Success!";
      $res['name'] = $data['name'];
      $res['username']= $data['username'];
      return response($res);
    }
    else
    {
      $res['status'] = false;
      $res['code'] = 400;
      $res['message'] = "username dan password salah";
      return response($res);

    }
  }

  public function forgotpass(Request $request)
  {
    $this->validate($request, [
        $user = $request->input('username')
        ]);

    $data = Supir::where('username',$user)->first();
    $passencrypt = md5($user);
    $data->password = $passencrypt;
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

  public function gantipass(Request $request)
  {
    $this->validate($request, [
      $user = $request->input('username'),
      $passbaru = $request->input('passbaru')
      ]);

  $data = Supir::where('username',$user)->first();
  $passencrypt = md5($passbaru);
  $data->password = $passencrypt;
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

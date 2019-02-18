<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
  protected $table = 'tb_supir';

protected $fillable = [
  'id',
  'name',
  'username',
  'password',
  'mobil_id'
];
public function Mobil()  {
      return $this->belongsTo('App\Mobil');
    }

}

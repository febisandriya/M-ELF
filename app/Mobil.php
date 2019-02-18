<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
  protected $table = 'tb_mobil';

protected $fillable = [
  'id',
  'platno'
];
public function Supir()  {
    return $this->HasMany('App\Supir');
  }
}

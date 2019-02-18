<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  protected $table = 'kategori';

protected $fillable = [
  'id',
  'name'
];
public function Daruat()  {
    return $this->HasMany('App\Darurat');
  }
}

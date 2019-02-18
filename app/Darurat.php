<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Darurat extends Model
{
  protected $table = 'darurats';

protected $fillable = [
  'id',
  'kategori_id',
  'gambar',
  'keterangan'
];
  public function Kategori()  {
      return $this->belongsTo('App\Kategori');
    }
}

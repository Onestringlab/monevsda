<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengawas extends Model
{
	public $primaryKey  = 'idpengawas';
	protected $table = 'tb_pengawas';

	public function konsultan()
  {
    return $this->belongsTo('App\Konsultan','idkonsultan');
  }
}
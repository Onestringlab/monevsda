<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanFisikp extends Model
{
	public $primaryKey  = 'idlaporanfisikp';
	protected $table = 'tb_laporanfisikp';

	public function dataphotofisikp()
	{
		return $this->hasMany('App\PhotoFisikp','idlaporanfisikp');
	}

	public function pekerjaan()
	{
		return $this->belongsTo('App\Pekerjaan','idpekerjaan');
	}
}
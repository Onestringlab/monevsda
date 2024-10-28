<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanFisik extends Model
{
	public $primaryKey  = 'idlaporanfisik';
	protected $table = 'tb_laporanfisik';

	public function dataphotofisik()
	{
		return $this->hasMany('App\PhotoFisik','idlaporanfisik');
	}

	public function pekerjaan()
	{
		return $this->belongsTo('App\Pekerjaan','idpekerjaan');
	}

}
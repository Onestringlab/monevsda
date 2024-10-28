<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoFisik extends Model
{
	public $primaryKey  = 'idphotofisik';
	protected $table = 'tb_photofisik';

	public function laporanfisik()
	{
		return $this->belongsTo('App\LaporanFisik','idlaporanfisik','idlaporanfisik');
	}
}
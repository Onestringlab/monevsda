<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoFisikp extends Model
{
	public $primaryKey  = 'idphotofisikp';
	protected $table = 'tb_photofisikp';

	public function laporanfisikp()
	{
		return $this->belongsTo('App\LaporanFisikp','idlaporanfisikp','idlaporanfisikp');
	}
}
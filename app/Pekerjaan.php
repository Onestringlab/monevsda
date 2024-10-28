<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
	public $primaryKey  = 'idpekerjaan';
	protected $table = 'tb_pekerjaan';

	public function kegiatan()
	{
		return $this -> belongsTo('App\Kegiatan', 'idkegiatan');
	}

	public function kecamatan()
	{
		return $this -> belongsTo('App\Kecamatan', 'idkecamatan');
	}

	public function desa()
	{
		return $this -> belongsTo('App\Desa', 'iddesa');
	}

}
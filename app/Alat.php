<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
	public $primaryKey  = 'idalat';
	protected $table = 'tb_alat';

	public function pekerjaan()
	{
		return $this->belongsTo('App\Alat','idpekerjaan');
	}
}


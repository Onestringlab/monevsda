<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Alatp extends Model
{
	public $primaryKey  = 'idalatp';
	protected $table = 'tb_alatp';

	public function pekerjaan()
	{
		return $this->belongsTo('App\Alatp','idpekerjaan');
	}
}
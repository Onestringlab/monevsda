<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
	public $primaryKey  = 'idkegiatan';
	protected $table = 'tb_kegiatan';

	public function program()
	{
		return $this->belongsTo('App\Program','idprogram');
	}

	public function datapekerjaan()
	{
		return $this->hasMany('App\Pekerjaan','idkegiatan');
	}
}
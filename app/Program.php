<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	public $primaryKey  = 'idprogram';
	protected $table = 'tb_program';

	public function datakegiatan()
	{
		return $this->hasMany('App\Kegiatan','idprogram');
	}
}
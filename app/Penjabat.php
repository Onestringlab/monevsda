<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjabat extends Model
{
	public $primaryKey  = 'idpenjabat';
	protected $table = 'tb_penjabat';

	public function sk()
  {
    return $this->belongsTo('App\SK','idsk');
  }
}
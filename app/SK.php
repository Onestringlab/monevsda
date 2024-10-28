<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class SK extends Model
{
	public $primaryKey  = 'idsk';
	protected $table = 'tb_sk';

	public function penjabat()
  {
    return $this->hasMany('App\Penjabat','idsk','idsk');
  }
}
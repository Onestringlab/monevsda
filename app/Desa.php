<?php
namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;


class Desa extends Model
{
	public $primaryKey  = 'iddesa';
	protected $table = 'tb_desa';

	public function kecamatan()
  {
    return $this->belongsTo('App\Kecamatan','idkecamatan');
  }
}
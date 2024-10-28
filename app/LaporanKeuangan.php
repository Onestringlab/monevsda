<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
	public $primaryKey  = 'idlaporankeuangan';
	protected $table = 'tb_laporankeuangan';
}
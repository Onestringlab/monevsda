<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
	public $primaryKey  = 'idkecamatan';
	protected $table = 'tb_kecamatan';
}
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultan extends Model
{
	public $primaryKey  = 'idkonsultan';
	protected $table = 'tb_konsultan';
}
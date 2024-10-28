<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	public $primaryKey  = 'idlog';
	protected $table = 'tb_log';

}
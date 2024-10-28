<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Username extends Model
{
	public $primaryKey  = 'idusername';
	protected $table = 'tb_username';
}
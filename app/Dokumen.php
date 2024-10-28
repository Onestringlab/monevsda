<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
	public $primaryKey  = 'iddokumen';
	protected $table = 'tb_dokumen';
}
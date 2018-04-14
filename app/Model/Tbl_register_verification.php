<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tbl_register_verification extends Model
{
    protected $table = 'tbl_register_verification';
	protected $primaryKey = "register_verification_id";
	public $timestamps = false;
}

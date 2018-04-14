<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tbl_software_user extends Model
{
    protected $table = 'tbl_software_user';
	protected $primaryKey = "software_user_id";
	public $timestamps = false;

	public static function scopeJoinVerification($query)
	{
		$query->join('tbl_register_verification','tbl_register_verification.register_verification_id','=','tbl_software_user.register_verification_id');
	}
}
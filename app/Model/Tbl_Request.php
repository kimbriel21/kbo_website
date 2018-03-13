<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tbl_Request extends Model
{
    protected $table = 'tbl_request';
	protected $primaryKey = "request_id";
	public $timestamps = false;

	public static function joinUser($query)
	{
		return $query->join('user', 'user.id', '=', 'tbl_request.id');
	}
}

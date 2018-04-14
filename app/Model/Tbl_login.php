<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tbl_login extends Model
{
    protected $table = 'tbl_login';
	protected $primaryKey = "login_id";

    public function scopeJoinMember($query)
    {
        $query->join("tbl_server_user", "tbl_server_user.id", "=", "tbl_login.id");
    }
}

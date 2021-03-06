<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tbl_Request extends Model
{
    protected $table = 'tbl_request';
	protected $primaryKey = "request_id";
	public $timestamps = false;

	public static function scopejoinUsers($query,$params)
	{

		$query->select('request_id','location_longhitude','location_latitude','office_branch','emergency_type','emergency_category','date_requested','status','first_name','last_name','contact_number','address','email');
		
		$query->leftjoin('users', 'users.id', '=', 'tbl_request.id');

		if ($params['emergency_type'] != "" || $params['emergency_type'] != null) 
		{
			$query->where('emergency_type',$params['emergency_type']);
		}

		if ($params['request_date'] != "" || $params['request_date'] != null) {
			$query->whereDate('date_requested',$params['request_date']);
		}

		if ($params['status'] != "" || $params['status'] != null) 
		{
			$query->where('status',$params['status']);
		}

		if ($params['office_branch'] != "" || $params['office_branch'] != null) 
		{
			$query->where('office_branch',$params['office_branch']);
		}

		return $query;
	}
}

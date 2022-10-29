<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'students';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'avatar',
        'gender',
        'dob'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];


	/**
	 * Get Data List
	 * @param		data keyword
	 * @param		data sort
	 * @param		data limit
	 * @param		data offset
	 * @return 		data array
	 */
	public static function getList($keyword = "", $sort = [], $limit = 10, $offset = 0, $filters = [], $type = "")
	{

		$datas = new self;

		$result = [];
		$result['recordsTotal'] = $datas->count();
		$result['recordsFiltered'] = 0;
		$result['data'] = [];

		if (!empty($keyword)) {
			$datas = $datas->where(function ($query) use ($keyword) {
				$query->whereRaw("lower(name) like '%". strtolower($keyword) ."%'");
			});
		}
		$result['recordsFiltered'] = $datas->count();

		$datas = !empty($sort) ? $datas->orderBy($sort['field'], $sort['direction']) : $datas->orderBy((new self)->getKeyName(), 'desc');
		if (!empty($limit) && $limit > 0):
			$datas = $datas->offset($offset);
			$datas = $datas->limit($limit);
		endif;

        $datas = $datas->select('id','name','avatar','gender','dob');
		$datas = $datas->get()->toArray();

		foreach ($datas as $row => $data) {
            $buffy = '<a href="'. route('student.edit', ['id' => $data['id']]) .'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>';
            $buffy .= '<a href="'. route('student.delete', ['id' => $data['id']]) .'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

			$result['data'][$row] = $data;
			$result['data'][$row]['avatar'] = '<img class="img-size-50 mr-3 img-circle" src="'.url('storage/uploads/' . $data['avatar']).'">';
			$result['data'][$row]['dob'] = Carbon::parse($data['dob'])->format('Y-m-d');
			$result['data'][$row]['action'] = $buffy;
		}

		return $result;
	}

}

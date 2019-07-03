<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	/**
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * @var string
	 */
	protected $table = 'settings';

	/**
	 * @var array
	 */
    protected $fillable = [
    	'delivery',
		'tel',
		'map',
		'email',
		'policytermsandconditions'
	];

	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

}

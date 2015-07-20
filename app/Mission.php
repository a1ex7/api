<?php

namespace App/Mission;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model {

	protected $table = 'missions';
	public $timestamps = true;

	public function mission()
	{
		return $this->hasMany('Target');
	}

	public function mission()
	{
		return $this->hasMany('Employee');
	}

}
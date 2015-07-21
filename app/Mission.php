<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model {

	protected $table = 'missions';
	public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'status'];

	public function targets()
	{
		return $this->hasMany('App\Target');
	}

	public function employees()
	{
		return $this->hasMany('App\Employee');
	}

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model {

	protected $table = 'targets';
	public $timestamps = false;

    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }

}
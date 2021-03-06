<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = "tags";

	protected $fillable = array('name', 'slug');

	public function company()
	{
		return $this->belongsToMany('App\Company');
	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {

	protected $table = "sub_categories";

	public function company()
	{
		return $this->hasMany('App\Company', 'sub_category_id', 'id');
	}

	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}
}

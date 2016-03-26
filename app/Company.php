<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	protected $table = "companies";
	protected $fillable = ["name","address","city","state","country","phone","fax","slug"];

	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}

	public function subcategory()
	{
		return $this->hasOne('App\Subcategory', 'id', 'sub_category_id');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

}

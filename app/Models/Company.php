<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	protected $table = 'comapnies';
	protected $fillable = ['name', 'url', 'address', 'country', 'state', 'city', 'profile', 'category_id', 'sub_category_id', 'others'];

    /* Relationships */
    public function category()
    {
        return $this->hasOne('App\Category');
    }

    /* Relationships */
    public function subcategory()
    {
        return $this->hasOne('App\Subcategory');
    }
}

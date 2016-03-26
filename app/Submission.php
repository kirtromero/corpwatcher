<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model {

	protected $fillable = ["name","address","city","state","country","phone","fax","slug"];


}

<?php namespace App\Http\Controllers;

use App\Company;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CompanyController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index($slug)
	{
		$data['company'] = Company::where('slug',$slug)->first();
		$data['similar_companies'] = Company::where('sub_category_id', $data['company']->sub_category_id)->take(14)->get();
		$data['page_title'] = stripslashes($data['company']->name) . " - Corpwatcher.com";

		return view('company_details', $data);
	}


	public function add()
	{
		$data['categories'] = Category::all();


		return view('addcompany', $data);
	}

}

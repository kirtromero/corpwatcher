<?php namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Submission;
use App\Company;
use App\Category;
use App\Subcategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubmitController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['categories'] = Category::all();

		return view('submission',$data);
	}


	public function submit()
	{
		$secret = "6LeFIBITAAAAAOwUEJb70L1u_E_DI2ORn6OJmVDy";

		if(\Request::input('g-recaptcha-response') == $secret)
		{
			$slug = str_slug(\Request::input('name'),"-");
			$count = Company::where('slug', $slug)->count();

			if($count > 0)
			{
				$slug = $slug . '-' . $count + 1;
			}

			$count_user = User::where('email', \Request::input('email'))->count();

			if($count_user == 0)
			{
				$user = new User;
				$user->name = \Request::input('username');
				$user->email = \Request::input('email');
				$user->name = \Request::input('password');
				$user->save();
			}
			else
			{
				$user = User::where('email', \Request::input('email'))->first();
			}

			$company = new Submission;
			$company->user_id = $user->id;
			$company->name = \Request::input('name');
			$company->url = \Request::input('url');
			$company->address = \Request::input('address');
			$company->city = \Request::input('city');
			$company->state = \Request::input('state');
			$company->country = \Request::input('country');
			$company->category_id = \Request::input('category_id');
			$company->sub_category_id = \Request::input('sub_category_id');
			$company->phone = \Request::input('phone');
			$company->fax = \Request::input('fax');
			$company->slug = $slug;
			$company->save();

			return redirect('/submit')->with('success', 'We got your business submission we will notify you within 24-48 hours!');
		}
		else
		{
			return redirect('/submit')->with('failed', 'Wrong captcha!');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

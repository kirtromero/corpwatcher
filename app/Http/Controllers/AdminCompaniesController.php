<?php namespace App\Http\Controllers;

use App\Company;
use App\Category;
use App\Subcategory;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCompaniesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['companies'] = Company::all();
		return view('admin.company.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['companies'] = Company::all();
		$data['categories'] = Category::all();
		$data['tags'] = Tag::all();

		return view('admin.company.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$slug = str_slug(\Request::input('name'),"-");
		$count = Company::where('slug', $slug)->count();

		if($count > 0)
		{
			$slug = $slug . '-' . $count + 1;
		}

		$company = new Company;
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

		return redirect('/admin/companies/')->with('success', 'New Company Added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['company'] = Company::findOrFail($id);
		return view('admin.company.index', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['company'] = Company::findOrFail($id);
		$data['categories'] = Category::all();
		$data['tags'] = Tag::all();
		$company_tags = array();
		foreach($data['company']->tags->toArray() as $tag){
			$company_tags[] = $tag['id'];
		}
		$data['company_tags'] = $company_tags;
		$data['subcategories'] = Subcategory::where("category_id", $data['company']->category_id)->get();

		return view('admin.company.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$company = Company::findOrFail($id);
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
		$company->slug = str_slug(\Request::input('name'),"-");
		$company->save();

		if(\Request::has('tags'))
		{
			foreach(\Request::input('tags') as $tag_id)
			{

				if( !is_numeric($tag_id) )
				{
					$tag = Tag::firstOrCreate(['name' => $tag_id]);
					$tag->name = $tag_id;
					$tag->slug = str_slug($tag_id,"-");
					$tag->save();
					$tag_id = $tag->id;
				}

				$company->tags()->attach($tag_id);
			}
		}


		return redirect('/admin/companies/'.$id.'/edit')->with('success', 'Company updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$company = Company::findOrFail($id);
		$company->delete();

		return redirect('/admin/companies/')->with('success', 'Company Successfully deleted!!');
	}

}

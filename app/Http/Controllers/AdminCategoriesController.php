<?php namespace App\Http\Controllers;

use App\Company;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['categories'] = Category::all();
		return view('admin.category.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['categories'] = Category::all();
		return view('admin.category.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$category = new Category;
		$category->name = \Request::input('name');
		$category->slug = str_slug(\Request::input('name'),"-");
		$category->icon = \Request::input('icon');
		$category->save();

		return redirect('/admin/categories/')->with('success', 'New category Added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['category'] = Category::findOrFail($id);
		return view('admin.category.index', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['category'] = Category::findOrFail($id);
		return view('admin.category.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);
		$category->name = \Request::input('name');
		$category->slug = \Request::input('slug');
		$category->icon = \Request::input('icon');
		$category->save();

		return redirect('/admin/categories/'.$id.'/edit')->with('success', 'category updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);
		$category->delete();

		return redirect('/admin/categories/')->with('success', 'category Successfully deleted!!');
	}

}

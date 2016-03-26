<?php namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminSubCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['subcategories'] = Subcategory::all();
		return view('admin.subcategory.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['categories'] = Category::all();

		return view('admin.subcategory.add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$subcategory = new Subcategory;
		$subcategory->name = \Request::input('name');
		$subcategory->category_id = \Request::input('category_id');
		$subcategory->slug = str_slug(\Request::input('name'),"-");

		$subcategory->save();

		return redirect('/admin/subcategories/')->with('success', 'New subcategory Added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['subcategory'] = Subcategory::findOrFail($id);
		return view('admin.subcategory.index', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['subcategory'] = Subcategory::findOrFail($id);
		$data['categories'] = Category::all();

		return view('admin.subcategory.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subcategory = Subcategory::findOrFail($id);
		$subcategory->name = \Request::input('name');
		$subcategory->category_id = \Request::input('category_id');
		$subcategory->slug = \Request::input('slug');

		$subcategory->save();

		return redirect('/admin/subcategories/'.$id.'/edit')->with('success', 'subcategory updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subcategory = Subcategory::findOrFail($id);
		$subcategory->delete();

		return redirect('/admin/subcategories/')->with('success', 'subcategory Successfully deleted!!');
	}

}

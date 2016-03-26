<?php namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminTagsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['tags'] = Tag::all();
		return view('admin.tags.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tags.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tag = new Tag;
		$tag->name = \Request::input('name');
		$tag->slug = str_slug(\Request::input('name'),"-");
		$tag->save();

		return redirect('/admin/tags/')->with('success', 'New tag Added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['tag'] = Tag::findOrFail($id);
		return view('admin.tags.index', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['tag'] = Tag::findOrFail($id);

		return view('admin.tags.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tag = Tag::findOrFail($id);
		$tag->name = \Request::input('name');
		$tag->slug = \Request::input('slug');
		$tag->save();

		return redirect('/admin/tags/'.$id.'/edit')->with('success', 'Tag updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tag = Tag::findOrFail($id);
		$tag->delete();

		return redirect('/admin/tags/')->with('success', 'Tag Successfully deleted!!');
	}

}

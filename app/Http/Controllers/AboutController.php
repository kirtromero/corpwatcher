<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('about');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clansearch');
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function ajaxClanSearch(Request $request)
	{
		$search = $request->input('name');
		$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjAyNDUyNDdmLThkYWQtNDZiZi05OTI3LWYxZmZhNzk1NmM4NyIsImlhdCI6MTQ1NDUxMzUyOCwic3ViIjoiZGV2ZWxvcGVyLzEzODhiNmIyLThiYzItNGNkNi1iYjczLWFmM2M4ZjMzZjdkYyIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4MC4xOTAuOTAuMjE0Il0sInR5cGUiOiJjbGllbnQifV19.1ozV-uTgBZuSkRAKGGeTJTzeeDSy31sD0aUCHT5ouGGb3k3HkD7g-vT1wuxuKTudo4q5yv2p9-7thM1cpEJi7Q";
		$token1 = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjFiZGIyN2UxLTJjZjktNDg3MS04YmQ1LWI0ODI0ODU0NGNiZiIsImlhdCI6MTQ1NDUxMTUzOSwic3ViIjoiZGV2ZWxvcGVyLzEzODhiNmIyLThiYzItNGNkNi1iYjczLWFmM2M4ZjMzZjdkYyIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjEwOC4xNzkuMjQ4LjIwOSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.6SfsKuiiiaDATjGjRb5hXkkvHzbYf2zWU1ASVXscI0CLmOERNxW2MQJzIGfxXMfQg6TQm6K69W4pa2EGbNCcmA";
		$url = "https://api.clashofclans.com/v1/clans?name=".urlencode($search);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array(
			'authorization: Bearer ' . $token1,
			'Content-Type: application/json'));
		$cookies = "";
		foreach($_COOKIE as $k=>$v)
			$cookies .= $k.'='.$v.';';

		curl_setopt($ch, CURLOPT_COOKIE, '"'.$cookies. '"');

		$curldata = curl_exec($ch);

		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

		$header = substr($curldata, 0, $header_len);

		$body = substr($curldata, $header_len);

		curl_close($ch);

		return $body;
	}

}

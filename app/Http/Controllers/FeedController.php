<?php namespace App\Http\Controllers;

use App\Company;
use App\Category;
use App\Subcategory;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FeedController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$row = 1;
		if (($handle = fopen("/home/corpwatcher/public_html/corpwatcher/corpwatcher-1.csv", "r")) !== FALSE)
		{
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			{

				if(isset($data[2]) && isset($data[3]))
				{
					$slug = str_slug($data[2],"-");
					$count = Company::where('slug', $slug)->count();

					if($count > 0)
					{
						$slug = $slug . '-' . $count + 1;
					}

					$count_company = Company::where('name','LIKE', '%'.$data[2].'%')->count();
					if($count_company == 0){
						echo 'Name: ' . $data[2] . '<br>';
						echo 'Category: ' . $data[3] . ' - '. $this->checkCategory($data[3]).'<br>';
						echo 'Address: ' . $data[4] . '<br>';
						echo 'City: ' . $data[5] . '<br>';
						echo 'State: ' . $data[6] . '<br>';
						echo 'Phone: ' . $data[7] . '<br>';
						echo 'Profile: ' . $data[8] . '<br><br>';

						$company = new Company;
						$company->name = $data[2];
						$company->address = $data[4];
						$company->city = $data[5];
						$company->state = $data[6];
						$company->country = "PH";
						$company->category_id = $this->checkCategory($data[3]);
						$company->sub_category_id = $this->checkSubCategory($data[3],$this->checkCategory($data[3]));
						$company->phone = $data[7];
						$company->profile = $data[8];
						$company->slug = $slug;
						$company->save();
					}
					else
					{
						$company = Company::where('name','LIKE', '%'.$data[2].'%')->first();
						$company->name = $data[2];
						$company->address = $data[4];
						$company->city = $data[5];
						$company->state = $data[6];
						$company->country = "PH";
						$company->category_id = $this->checkCategory($data[3]);
						$company->sub_category_id = $this->checkSubCategory($data[3],$this->checkCategory($data[3]));
						$company->phone = $data[7];
						$company->profile = $data[8];
						$company->slug = $slug;
						$company->save();
					}
				}
			}
			fclose($handle);
		}
	}

	public function getFixFeed()
	{
		$count = Company::where('slug','1')->count();
		echo $count;
		echo "<br>";
		$companies = Company::where('slug','1')->take(1000)->get();

		foreach ($companies as $key => $com) {
			$slug = str_slug($com->name,"-");
			$company = Company::find($com->id);
			$company->slug = $slug;
			$company->save();
			echo $slug .' - '. $com->id;
			echo "<br>";
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

	public function checkSubCategory($name,$category_id)
	{
		$count = Subcategory::where('name','LIKE', '%'.$name.'%')->count();
		if($count == 0)
		{
			$subcategory = new Subcategory;
			$subcategory->name = $name;
			$subcategory->category_id = $category_id;
			$subcategory->slug = str_slug($name,"-");
			$subcategory->save();
		}
		else
		{
			$subcategory = Subcategory::where('name','LIKE', '%'.$name.'%')->first();
		}
		return $subcategory->id;
	}


	public function checkCategory($a)
	{
		if (strpos($a,'trading') !== false) {
		    $category_id = 4;
		}elseif (strpos($a,'retail') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'service') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'bank') !== false) {
			$category_id = 5;
		}elseif (strpos($a,'Automatic Teller Machines') !== false) {
			$category_id = 5;
		}elseif (strpos($a,'Manufacturing') !== false) {
			$category_id = 6;
		}elseif (strpos($a,'health') !== false) {
			$category_id = 7;
		}elseif (strpos($a,'drugs') !== false) {
			$category_id = 7;
		}elseif (strpos($a,'pharma') !== false) {
			$category_id = 7;
		}elseif (strpos($a,'Advertising') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Real Estate') !== false) {
			$category_id = 1;
		}elseif (strpos($a,'Food and Foodstuff') !== false) {
			$category_id = 2;
		}elseif (strpos($a,'Photography') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Gaming cafe') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Stores') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'MINING') !== false) {
			$category_id = 8;
		}elseif (strpos($a,'Apartment') !== false) {
			$category_id = 1;
		}elseif (strpos($a,'houseing') !== false) {
			$category_id = 1;
		}elseif (strpos($a,'Toys') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'construction') !== false) {
			$category_id = 10;
		}elseif (strpos($a,'Lessor') !== false) {
			$category_id = 5;
		}elseif (strpos($a,'Wholesaler') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Graphics Design') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'car') !== false) {
			$category_id = 9;
		}elseif (strpos($a,'Educational Institutions') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'church') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Public High School') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Information and Communications Technology') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Store') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Carinderia') !== false) {
			$category_id = 2;
		}elseif (strpos($a,'clinic') !== false) {
			$category_id = 7;
		}elseif (strpos($a,'Merchandise') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Travel') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Marketing') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'consultancy') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Forwarding') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Non-Stock / Non-Profit') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'SEO') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'BAKERY') !== false) {
			$category_id = 2;
		}elseif (strpos($a,'supplier') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Water Refilling Stations') !== false) {
			$category_id = 2;
		}elseif (strpos($a,'Electronics') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Services') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Retailer') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Warehouse') !== false) {
			$category_id = 3;
		}elseif (strpos($a,'Metal Products') !== false) {
			$category_id = 6;
		}elseif (strpos($a,'Paints') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'WHOLESALE') !== false) {
			$category_id = 4;
		}elseif (strpos($a,'Clinic') !== false) {
			$category_id = 7;
		} else {
			$category_id = 3;
		}
		return $category_id;
	}

}

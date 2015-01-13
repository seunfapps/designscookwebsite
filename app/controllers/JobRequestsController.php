<?php

class JobRequestsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		$categories = Category::all();		
		return View::make('job/post_a_job',array('categories' => $categories))->withInput();
	}


	public function brief($id)
	{
		//

		if($id){
			$subcategory = SubCategory::find($id);
			Session::put('id',$id);			
			return View::make('job/job_brief',array('name' => $subcategory->name, 'price' => $subcategory->price,'id'=>$id));
		}
		
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

	 *
	 * @return Response
	 */
	public function details()
	{
		//
		$job_details = Session::get('job_details');
		return View::make('job/job_details',['job_details'=>$job_details] );

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
	public function updatebrief()
	{
		//
		$destinationPath = '';
		$filename = '';
		if(Input::hasFile('upload')){
			$file = Input::file('upload');
			$destinationPath = public_path().'/uploads/';
			$filename = str_random(6).'_'.$file->getClientOriginalName();
			$file->move($destinationPath,$filename);
		}
		$subcategory = SubCategory::find(Session::get('id'));

		$job_details = array('title' => Input::get('title'),
			'description' => Input::get('description'),
			'file'=>$destinationPath.':'.$filename,
			'subcategory_id' => Session::get('id'),
			'design_name'=> $subcategory->name,
			'category'=> $subcategory->category->name,
			'cost'=>$subcategory->price, );
			
		Session::put('job_details',$job_details);
		return Redirect::to('job/details');
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

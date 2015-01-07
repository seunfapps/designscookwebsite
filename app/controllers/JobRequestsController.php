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
		
		return View::make('job/post_a_job',array('categories' => $categories));
	}


	public function details($id)
	{
		//

		if($id){
			$subcategory = SubCategory::find($id);
			Session::put('id',$id);
			return View::make('job/job_details',array('name' => $subcategory->name, 'price' => $subcategory->price,'id'=>$id));
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
	public function confirm()
	{
		//
		return View::make('job/order_confirm', array('id' => Session::get('id')));

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
	public function update()
	{
		//
		$destinationPath = '';
		$filename = '';
		if(Input::hasFile('upload')){
			$file = Input::file('upload');
			$destinationPath = public_path().'/uploads/';
			$filename = str_random(6).'_'.$file->getClientOriginalName();
			$uploadSuccess =  $file->move($destinationPath,$filename);
		}
		$job = JobRequest::create([
			'title' => Input::get('title'),
			'description' => Input::get('description'),
			'file'=>$destinationPath.':'.$filename,
			]);
		Input::flash();

		return Redirect::to('job/confirm')->withInput(Input::all());
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

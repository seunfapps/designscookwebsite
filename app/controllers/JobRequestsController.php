<?php

class JobRequestsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $file;
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
		Session::forget('uploaded_file');
		Session::forget('job_details');
		$categories = Category::all();		
		return View::make('job/pick_category',array('categories' => $categories));
	}

	
	public function brief($id)
	{
		//
			$job_request = new JobRequest;
			if(Session::has('job_details')){
				$job_details = Session::pull('job_details');
				$job_request->title = $job_details ['title'];
				$job_request->description = $job_details ['description'];
				
			}
			$subcategory = SubCategory::find($id);
			Session::put('id',$id);						
			return View::make('job/job_brief',array('job_request'=> $job_request,'name' => $subcategory->name, 'price' => $subcategory->price,'id'=>$id));
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
			$this->file = Input::file('upload');
			$destinationPath = public_path().'/uploads/';
			$filename = str_random(6).'_'.$this->file->getClientOriginalName();
			// $this->file->move($destinationPath,$filename);
			Session::put('uploaded_file', $this->file->getClientOriginalName());
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		echo "I am here";
		if(Auth::check()){

		}else{

		}

		
	}


	/**

	 *
	 * @return Response
	 */
	public function details()
	{
		//
		if(Session::has('job_details')){
			$job_details = Session::get('job_details');
			return View::make('job/job_details',['job_details'=>$job_details] );
		}else{
			return Redirect::to(job/post);
		}
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

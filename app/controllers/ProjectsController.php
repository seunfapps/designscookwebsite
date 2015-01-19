<?php

class ProjectsController extends \BaseController {

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
		Session::forget('project_details');
		$categories = Category::all();		
		return View::make('project/pick_category',array('categories' => $categories));
	}

	
	public function brief($id)
	{
		//
			$project = new CustomerProject;
			$uploaded_file = '';
			if(Session::has('project_details')){
				$project_details = Session::pull('project_details');
				$uploaded_file = $Session::pull('uploaded_file');
				$project->title = $project_details ['title'];
				$project->description = $project_details ['description'];
				
			}
			$subcategory = SubCategory::find($id);
			Session::put('id',$id);						
			return View::make('project/project_brief',array('project'=> $project,'uploaded_file'=>$uploaded_file, 'name' => $subcategory->name, 'price' => $subcategory->price,'id'=>$id));
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

		$project_details = array('title' => Input::get('title'),
			'description' => Input::get('description'),
			'file'=>$destinationPath.':'.$filename,
			'subcategory_id' => Session::get('id'),
			'design_name'=> $subcategory->name,
			'category'=> $subcategory->category->name,
			'cost'=>$subcategory->price, );
		if(Auth::check()){
			$user = Auth::user();
			
		}
		Session::put('project_details',$project_details);
		Session::put('intended', 'project/details');
		return Redirect::to('project/details');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function payment()
	{
		//integrate to payment platform
		
		echo "Please pay";

		
	}


	/**
	 *
	 * @return Response
	 */
	public function details()
	{
		//
		if(Session::has('project_details')){
			$project_details = Session::get('project_details');
			return View::make('project/project_details',['project_details'=>$project_details] );
		}else{
			return Redirect::to(project/post);
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

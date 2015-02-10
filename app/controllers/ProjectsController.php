<?php

class ProjectsController extends \BaseController {

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
		Session::forget('uploaded_file');
		Session::forget('projectdetails');
		$categories = Category::all();		
		return View::make('project/post/pick_category',array('categories' => $categories));
	}

	
	public function brief($id)
	{
		//
			$subcategory = SubCategory::find($id);

			$project = new CustomerProject;
			$project->subcategory_id = $id;
			$project->design_name = $subcategory->name;
			$project->cost = $subcategory->price;
			if(Session::has('projectdetails')){
				$project = Session::get('projectdetails');
				echo $project;
			}
			Session::put('id',$id);
			return View::make('project/post/project_brief',array('project'=> $project));
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
		//echo ini_get('post_max_size');
		$file_max = ini_get('upload_max_filesize');
        $file_max_str_leng = strlen($file_max);
        $file_max_meassure_unit = substr($file_max,$file_max_str_leng - 1,1);
        $file_max_meassure_unit = $file_max_meassure_unit == 'K' ? 'kb' : ($file_max_meassure_unit == 'M' ? 'mb' : ($file_max_meassure_unit == 'G' ? 'gb' : 'unidades'));
        $file_max = substr($file_max,0,$file_max_str_leng - 1);
        $file_max = intval($file_max);
      	 // echo $file_max;
        // var_dump(Input::file('file'));
         //handle second case
        if((empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'))
        { //catch file overload error...
             //grab the size limits...
            return Redirect::back()->withErrors(sprintf('The file size should be lower than %s%s.',$file_max,$file_max_meassure_unit))->withInput();
        }
		$project = new CustomerProject;
		if(Session::has('projectdetails')){
			$project = Session::get('projectdetails');
		}

       	try {

			if(Input::hasFile('file')){
				$file = Input::file('file');
				$file_max = 15728640;
				$file_max_meassure_unit = "KB";
				if( $file->getClientSize() > $file_max){
					return Redirect::back()->withErrors(sprintf('The file size should be lower than %s%s.',$file_max,$file_max_meassure_unit))->withInput();
				}
				$destinationPath = public_path().'\\uploads\\';
				$filename = str_random(6).'_'.$file->getClientOriginalName();
				$file->move($destinationPath,$filename);
				$project->file= $destinationPath.','.$filename;
				$project->filename= $file->getClientOriginalName();

			}else{

			}
			
		} catch (Exception $e) {
			return Redirect::back()->withErrors(sprintf('The file size should be lower than %s%s.',$file_max,$file_max_meassure_unit))->withInput();
		}
		
		$subcategory = SubCategory::find(Session::get('id'));
		// echo $subcategory;
		$project->title = Input::get('title');
		$project->description = Input::get('description');
		$project->subcategory_id = Session::get('id');
		$project->design_name = $subcategory->name;
		$project->category = $subcategory->category->name;
		$project->cost = $subcategory->price;
			
		echo $project;
		if(Auth::check()){
			$user = Auth::user();
			
		}
		Session::put('projectdetails',$project);
		Session::put('intended', 'project/post/confirm_details');
		return Redirect::to('project/post/confirm_details')->with(['project'=>$project]);
	}

	
	public function deletefile($filename){
		$destinationPath = public_path().'\\uploads\\';
		File::delete($destinationPath.$filename);

		if(!File::exists($destinationPath.$filename)){
			$project = Session::get('projectdetails');
			$project->file = null;
			$project->filename = null;
			return json_encode('File successfully deleted.');
		}
		return json_encode('Error in deleting file.');

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function payment()
	{
		//integrate to payment platform
		
		// echo "Please pay";

		if(true){

			
			$project = Session::get('project');

		}

		
	}


	/**
	 *
	 * @return Response
	 */
	public function confirm_details()
	{
		//
		echo Session::get('projectdetails');
		if(Session::has('projectdetails')){
			$project = Session::get('projectdetails');
			return View::make('project/post/confirm_details',['project'=>$project] );
		}else{
			return Redirect::to('project/post');
		}
	}

	public function proj_details($id){
		if(Auth::check()){
			$project = CustomerProject::find($id);
			$user = Auth::user();

			// if($user->userable_type == 'Designer'){
				return View::make('project/details',['project'=>$project]);
			// }
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

	public function changestatus($id){
		if(Auth::check()){
			$user = Auth::user();
			if($user->userable->customerprojects->contains($id)){
				$user->userable->customerprojects()->detach($id);
			}else{
				$user->userable->customerprojects()->attach($id);
			}
		}
		return Redirect::to('project/details/'.$id);
	}
}

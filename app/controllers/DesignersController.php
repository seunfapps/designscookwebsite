<?php

class DesignersController extends \BaseController {
	public function dashboard($page = ''){
		if(Auth::check()){
			$user = Auth::user();
			$categories = Category::lists('name','id');
			array_push($categories,'All');
			asort($categories);
			switch ($page) {
				case 'profile':
					break;
				default:
					$projects = CustomerProject::join('design_categories', 'projects.subcategory_id','=','design_categories.id')
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
					$status = '';
					return View::make('users/designer/dashboard',['categories'=>$categories])->nest('child','users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
					break;
			}
			array_push($categories,'All');
			asort($categories);
			//echo implode(",", $categories);
			return View::make('users/designer/dashboard',['categories'=>$categories]);
		}
		return Redirect::to('login')->with('status', 'Please login or create a new account.');
	}

	public function cust_projects($categoryid,$status = null){
		if(Request::ajax()){
			$projects = null;
			$category = Category::find($categoryid);
			//echo $category.$status;
			if (empty($category)) {
				
				if(empty($status)){
					$projects = $projects = CustomerProject::join('design_categories', 'projects.subcategory_id','=','design_categories.id')
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
				}else{
					$projects = CustomerProject::join('design_categories', 'projects.subcategory_id','=','design_categories.id')
					->where('status','=',$status)
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
				}
			}
			else{
				if(empty($status)){
					$projects = CustomerProject::join('design_categories', 'projects.subcategory_id','=','design_categories.id')
					->where('design_categories.id','=',$categoryid)
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
				}else{
					$projects = CustomerProject::join('design_categories', 'projects.subcategory_id','=','design_categories.id')
					->where('design_categories.id','=',$categoryid)
					->where('status','=',$status)
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
				}
			}
			 // echo $projects;
			$view =  View::make('users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
			return $view;
		}else{
			$projects = '';
			if(Auth::check()){
				$user = Auth::user();
				if(empty($status)){
					$projects = CustomerProject::all();	
				}else{
					$projects = CustomerProject::where('status','=',$status)->get();
				}
				//return View::make('users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
					
			}
		}
	}

}

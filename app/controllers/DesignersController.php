<?php

class DesignersController extends \BaseController {
	public function dashboard($currenttab = ''){
		if(Auth::check()){
			$user = Auth::user();
		
			$categories = Category::lists('name','id');
			array_push($categories,'All');
			asort($categories);
			switch ($currenttab) {
				case 'profile':
					return View::make('users/designer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				case 'projects':
					$status = '';
					return View::make('users/designer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				case 'changepassword':

					return View::make('users/designer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				default:
					$currenttab = 'projects';
					return Redirect::to('designer/dashboard/'.$currenttab);
			}
			array_push($categories,'All');
			asort($categories);
			//echo implode(",", $categories);
			return View::make('users/designer/dashboard',['categories'=>$categories]);
		}
		return Redirect::to('login')->with('status', 'Please login or create a new account.');
	}

	public function cust_projects($categoryid,$status = null){
		//if(Request::ajax()){
			$projects = null;
			$category = Category::find($categoryid);
			$project = CustomerProject::all()->first();
			
			//echo $category.$status;
			if (empty($category)) {
				
				if(empty($status)){
				$projects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}else{
					$projects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('status','=',$status)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}
			}
			else{
				if(empty($status)){
					$projects = CustomerProject::join('design_subcategories', 'projects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('design_categories.id','=',$categoryid)
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
				}else{
					$projects = CustomerProject::join('design_subcategories', 'projects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('design_categories.id','=',$categoryid)
					->where('status','=',$status)
					->select('projects.id', 'projects.title', 'projects.description','projects.subcategory_id'
						,'projects.customer_id','design_categories.name as category_name','projects.created_at', 'projects.status')
					->orderBy('projects.created_at')
					->get();
				}
			}
			//echo $projects;
			$view =  View::make('users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
			return $view;
		// }else{
		// 	$projects = '';
		// 	if(Auth::check()){
		// 		$user = Auth::user();
		// 		if(empty($status)){
		// 			$projects = CustomerProject::all();	
		// 		}else{
		// 			$projects = CustomerProject::where('status','=',$status)->get();
		// 		}
		// 		//return View::make('users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
					
		// 	}
		// }
	}

	public function updateprofile(){
	
		$user = Auth::user();
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		//$user->email = Input::get('email');
		$user->phone = Input::get('phone');
		$user->company = Input::get('company');
		$user->country = Input::get('country');

		$designer = $user->userable;
		$designer->save();
		$designer->user()->save($user);

		return View::make('users/designer/updateprofile',['user'=>$user])->withErrors('Profile was successfully updated');
	}
}

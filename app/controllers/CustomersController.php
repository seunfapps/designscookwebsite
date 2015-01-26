<?php

class CustomersController extends \BaseController {
	public function dashboard($currenttab = ''){
		if(Auth::check()){
			$user = Auth::user();
			$categories = Category::lists('name','id');
			array_push($categories,'All');
			asort($categories);
			switch ($currenttab) {
				case 'profile':
					return View::make('users/customer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				case 'projects':
					$status = '';
					return View::make('users/customer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				case 'changepassword':

					return View::make('users/customer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				default:
					$currenttab = 'projects';
					return Redirect::to('customer/dashboard/'.$currenttab);
			}
			array_push($categories,'All');
			asort($categories);
			//echo implode(",", $categories);
			return View::make('users/customer/dashboard',['categories'=>$categories]);
		}
		return Redirect::to('login')->with('status', 'Please login or create a new account.');
	}

	public function cust_projects($categoryid,$status = null){
		$user= Auth::user();
		//echo $user;
		//if(Request::ajax()){

			$projects = null;
			$category = Category::find($categoryid);
			//echo $category.$status;
			if (empty($category)) {				
				if(empty($status)){
					$projects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('customerprojects.customer_id','=',$user->userable->id)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}else{
					$projects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('customerprojects.customer_id','=',$user->userable->id)
					->where('status','=',$status)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}
			}
			else{
				if(empty($status)){
					$projects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('customerprojects.customer_id','=',$user->userable->id)
					->where('design_categories.id','=',$categoryid)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}else{
					$projects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('customerprojects.customer_id','=',$user->userable->id)
					->where('design_categories.id','=',$categoryid)
					->where('status','=',$status)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}
			}
			 // echo $projects;
			$view =  View::make('users/customer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
			return $view;
		//}else{
			$projects = '';
			if(Auth::check()){
				$user = Auth::user();
				if(empty($status)){
					$projects = CustomerProject::all();	
				}else{
					$projects = CustomerProject::where('status','=',$status)->get();
				}
				//return View::make('users/customer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
					
			}
		//}
	}

	public function updateprofile($details){
		$user = Auth::user();
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		//$user->email = Input::get('email');
		$user->phone = Input::get('phone');
		$user->company = Input::get('company');
		$user->country = Input::get('country');

		$customer = $user->userable;
		$customer->save();
		$customer->user()->save($user);

		return View::make('users/customer/updateprofile',['user'=>$user])->withErrors('Profile was successfully updated');
		
	}

	

}

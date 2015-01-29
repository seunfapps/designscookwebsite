<?php

class DesignersController extends \BaseController {
	public function dashboard($currenttab = ''){
		if(Auth::check()){
			$user = Auth::user();
			//echo $currenttab;
			$categories = Category::lists('name','id');
			array_push($categories,'All');
			asort($categories);
			switch ($currenttab) {
				case 'profile':
				case 'projects':
				case 'changepassword':
					return View::make('users/designer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
				default:
					$currenttab = '';
					return View::make('users/designer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
					
			}
			
			//echo implode(",", $categories);
			// return View::make('users/designer/dashboard',['categories'=>$categories,'currenttab'=>$currenttab]);
		}
		return Redirect::to('login')->with('status', 'Please login or create a new account.');
	}

	public function cust_projects($categoryid,$status = null){
		//if(Request::ajax()){
			$customerprojects = null;
			$category = Category::find($categoryid);
			
			//echo $category.$status;
			if (empty($category)) {
				
				if(empty($status)){
				$customerprojects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.cost','customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}else{
					$customerprojects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('status','=',$status)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.cost','customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}
			}
			else{
				if(empty($status)){
					$customerprojects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('design_categories.id','=',$categoryid)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.cost','customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}else{
					$customerprojects = CustomerProject::join('design_subcategories', 'customerprojects.subcategory_id','=','design_subcategories.id')
					->join('design_categories', 'design_subcategories.category_id','=','design_categories.id')
					->where('design_categories.id','=',$categoryid)
					->where('status','=',$status)
					->select('customerprojects.id', 'customerprojects.title', 'customerprojects.description','customerprojects.subcategory_id'
						,'customerprojects.cost','customerprojects.customer_id','design_categories.name as category_name','customerprojects.created_at', 'customerprojects.status')
					->orderBy('customerprojects.created_at')
					->get();
				}
			}
			//echo $customerprojects;
			$view =  View::make('users/designer/cust_projects',['customerprojects'=> $customerprojects,'projectstatus'=>$status]);
			return $view;
		// }else{
		// 	$customerprojects = '';
		// 	if(Auth::check()){
		// 		$user = Auth::user();
		// 		if(empty($status)){
		// 			$customerprojects = CustomerProject::all();	
		// 		}else{
		// 			$customerprojects = CustomerProject::where('status','=',$status)->get();
		// 		}
		// 		//return View::make('users/designer/cust_projects',['customerprojects'=> $customerprojects,'projectstatus'=>$status]);
					
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

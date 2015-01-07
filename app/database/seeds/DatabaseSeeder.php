<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoryTableSeeder');
		$this->call('SubCategoryTableSeeder');

	}

}

class CategoryTableSeeder extends Seeder{
	public function run()
	{
		DB::table('design_categories')->delete();
		Category::create(array('name'=>'Graphics'));
		Category::create(array('name'=>'Print'));
		Category::create(array('name'=>'Web'));
	}
}

class SubCategoryTableSeeder extends Seeder{
	public function run()
	{
		DB::table('design_subcategories')->delete();
		SubCategory::create(array('name'=>'Logo', 'category_id'=>1, 'price'=>1000));
		SubCategory::create(array('name'=>'Business Card', 'category_id'=>1, 'price'=>1000));
		SubCategory::create(array('name'=>'Letter Head', 'category_id'=>1, 'price'=>1000));
		SubCategory::create(array('name'=>'Name Tag', 'category_id'=>1, 'price'=>1000));
		SubCategory::create(array('name'=>'T-Shirt', 'category_id'=>1, 'price'=>1000));
		SubCategory::create(array('name'=>'Advertisement', 'category_id'=>2, 'price'=>1000));
		SubCategory::create(array('name'=>'Envelope', 'category_id'=>2, 'price'=>1000));
		SubCategory::create(array('name'=>'Flyer', 'category_id'=>2, 'price'=>1000));
		SubCategory::create(array('name'=>'Book Cover', 'category_id'=>2, 'price'=>1000));
		SubCategory::create(array('name'=>'Web Page', 'category_id'=>3, 'price'=>1000));
		SubCategory::create(array('name'=>'Banner Ad', 'category_id'=>3, 'price'=>1000));
		SubCategory::create(array('name'=>'Blog', 'category_id'=>3, 'price'=>1000));
		SubCategory::create(array('name'=>'Icon', 'category_id'=>3, 'price'=>1000));
	}
}
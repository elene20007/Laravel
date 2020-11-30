<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = array("საახალწლო","აბაზანა","ავეჯი","დეკორაცია","საოჯახო ტექსტილი","საოჯახო აქსესუარები","საზაფხულო");
    	foreach ($categories as $cat) {
    		DB::table('categories')->insert([
		        'category_name' => $cat,
			    ]);
    	}
    }
}

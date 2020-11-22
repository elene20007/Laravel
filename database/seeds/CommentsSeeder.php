<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i < 3; $i++){
		    DB::table('comments')->insert([
		        'post_id' => $i,
		        'comment'=>"comment".$i
		    ]);
    	}    
    }
}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model {

	protected $fillable = ['user_1','user_2'];

	public static function rules ($merge=[]) {
		return array_merge(
			[
				'user_1'      		=> 'required|max:25',
				'user_2'			=> 'required|max:25',
			], 
        $merge);
	}
	
	public static function niceNames () {
		return [
			'user_1'   	=> '<b>User 1</b>',
			'user_2' 	=> '<b>User 2</b>',
			
		];
	}

	

}
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model {

	protected $table = "conversations";
	protected $fillable = ['user1','user2'];

	public static function rules ($merge=[]) {
		return array_merge(
			[
				'user1'      		=> 'required|max:25',
				'user2'			=> 'required|max:25',
			], 
        $merge);
	}
	
	public static function niceNames () {
		return [
			'user1'   	=> '<b>User 1</b>',
			'user2' 	=> '<b>User 2</b>',			
		];
	}

	

}
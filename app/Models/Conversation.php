<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model {

	protected $table = "conversations";
	protected $fillable = ['user1_id','user1_accountname','user2_id','user2_accountname'];

	public static function rules ($merge=[]) {
		return array_merge(
			[
				'user1'      		=> 'required|max:25',
				'user1_accountname' => 'required|max:25',
				'user2'				=> 'required|max:25',
				'user2_accountname' => 'required|max:25'
			],
        $merge);
	}
	
	public static function niceNames () {
		return [
			'user1'   			=> '<b>Usuario 1</b>',
			'user2' 			=> '<b>Usuario 2</b>',
			'user1_accountname' => '<b>Cuenta Usuario 1</b>',
			'user2_accountname' => '<b>Cuenta Usuario 2</b>'
		];
	}
}
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $fillable = ['name','sender','email','conversation_id','subject','message'];

	public static function rules ($merge=[]) {
		return array_merge(
			[
				'conversation_id'	=> 'required',
				'message'   		=> 'required',
			], 
        $merge);
	}
	
	public static function niceNames () {
		return [
			'conversation_id' 	=> '<b>Conversacion</b>',
			'sender'			=> '<b>Envia</b>',
			'message'  			=> '<b>Mensaje</b>',
		];
	}

}
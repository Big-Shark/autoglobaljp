<?php
use Jenssegers\Mongodb\Model as Eloquent;

class Order extends Eloquent {

	protected $connection = 'mongodb';

	protected $guarded = array();

	public static $rules = array();

	public function customer(){
		return $this->belongsTo('Customer');
	}
}

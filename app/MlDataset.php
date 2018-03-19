<?php

namespace TOEcyd;

use Illuminate\Database\Eloquent\Model;

class MlDataset extends Model
{
	public $timestamps = false;
	protected $fillable = ['doc_id', 'category'];
	
	
	/**
	 * @param $doc_id
	 * @param $category
	 */
	public static function insertRow($doc_id, $category) {
		static::insert(['doc_id' => $doc_id, 'category' => $category]);
	}
}

<?php

namespace TOEcyd;

use Illuminate\Database\Eloquent\Model;

class MlDataset extends Model
{
	public $timestamps = false;
	protected $fillable = ['doc_id', 'category', 'doc_text', 'by_user'];
	
	
	/**
	 * @param $doc_id
	 * @param $category
	 * @param $doc_text
	 */
	public static function insertRow($doc_id, $category, $doc_text) {
		static::insert(['doc_id' => $doc_id, 'category' => $category, 'doc_text' => $doc_text]);
	}
}

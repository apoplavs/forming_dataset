<?php

namespace TOEcyd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MlDataset extends Model
{
	public $timestamps = false;
	protected $fillable = ['doc_id', 'category', 'confirm_category', 'doc_text', 'by_user', 'confirm_by_user'];
	
	
	/**
	 * @param $doc_id
	 * @param $category
	 * @param $doc_text
	 */
	public static function insertRow($doc_id, $category, $doc_text) {
		$is_first = static::select('category')
			->where('doc_id', '=', $doc_id)
			->first();
		// todo зробити перевірку випадку $category=11 OR $category=14
		// todo щоб записувалось окремим записом а не в confirm_category
		// якщо це перший документ, вносимо в БД, в іншому випадку confirm_category
		if ($is_first == NULL) {
			static::insert(['doc_id' => $doc_id, 'category' => $category, 'doc_text' => $doc_text, 'by_user' => Auth::user()->id]);
		} else {
			static::where('doc_id', '=', $doc_id)
			->update(['confirm_category' => $category, 'confirm_by_user' => Auth::user()->id]);
		}
		
		/* якщо кінцевим рішенням може бути документ тільки з певної категорії,
		відносимо його тієї категорії*/
		switch ($category) {
			case 11:
				MlDataset::insertRow($doc_id, 14, $doc_text);
				break;
			case 20:
				MlDataset::insertRow($doc_id, 23, $doc_text);
				break;
		}
		
	}
}

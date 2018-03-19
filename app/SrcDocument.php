<?php

namespace TOEcyd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SrcDocument extends Model
{
    public $timestamps = false;
	
	
	/**
	 * повертає набір цивільно-правових документів
	 * які можуть впливати на строки провадження
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function civil1() {
		$busy_docs = DB::table('ml_datasets')->pluck('doc_id');
		return (static::select('doc_id', 'doc_text')
			->where('justice_kind', 1)
			->where('judgment_code', 5)
			->where('instance_code', 3)
			->whereNotIn('doc_id', $busy_docs)->inRandomOrder()->take(5)->get());
	}
	
	/**
	 * повертає набір цивільно-правових документів
	 * для визначення типів кінцевих рішень
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function civil2() {
		$busy_docs = DB::table('ml_datasets')->pluck('doc_id');
		return (static::select('doc_id', 'doc_text')
			->where('justice_kind', 1)
			->where('judgment_code', 3)
			->where('instance_code', 3)
			->whereNotIn('doc_id', $busy_docs)->inRandomOrder()->take(5)->get());
	}
	
	/**
	 * повертає набір документів в кримінальному провадженні
	 * які можуть впливати на строки провадження
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function criminal1() {
		$busy_docs = DB::table('ml_datasets')->pluck('doc_id');
		return (static::select('doc_id', 'doc_text')
			->where('justice_kind', 2)
			->where('judgment_code', 5)
			->where('instance_code', 3)
			->whereNotIn('doc_id', $busy_docs)->inRandomOrder()->take(5)->get());
	}
	
	/**
	 * повертає набір документів в кримінальному провадженні
	 * для визначення типів кінцевих рішень
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function criminal2() {
		$busy_docs = DB::table('ml_datasets')->pluck('doc_id');
		return (static::select('doc_id', 'doc_text')
			->where('justice_kind', 2)
			->where('judgment_code', 1)
			->where('instance_code', 3)
			->whereNotIn('doc_id', $busy_docs)->inRandomOrder()->take(5)->get());
	}
	
	/**
	 * повертає набір документів
	 * які можуть впливати на строки провадження
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function commercial1() {
		return ;
	}
	
	/**
	 * повертає набір документів
	 * для визначення типів кінцевих рішень
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function commercial2() {
		return ;
	}
	
	
	/**
	 * повертає набір документів
	 * які можуть впливати на строки провадження
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function admin1() {
		return ;
	}
	
	
	/**
	 * повертає набір документів
	 * для визначення типів кінцевих рішень
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function admin2() {
		return ;
	}
	
	
	/**
	 * повертає набір документів в провадженні КУпАП
	 * які можуть впливати на строки провадження
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function adminoffense1() {
		$busy_docs = DB::table('ml_datasets')->pluck('doc_id');
		return (static::select('doc_id', 'doc_text')
			->where('justice_kind', 5)
			->where('judgment_code', 5)
			->where('instance_code', 3)
			->whereNotIn('doc_id', $busy_docs)->inRandomOrder()->take(5)->get());
	}
	
	
	/**
	 * повертає набір документів в провадженні КУпАП
	 * для визначення типів кінцевих рішень
	 * @return \Illuminate\Database\Eloquent\Collection
	 * \Illuminate\Database\Query\Builder[]
	 * \Illuminate\Support\Collection
	 * SrcDocument[]
	 */
	public static function adminoffense2() {
		$busy_docs = DB::table('ml_datasets')->pluck('doc_id');
		return (static::select('doc_id', 'doc_text')
			->where('justice_kind', 5)
			->where('judgment_code', 2)
			->where('instance_code', 3)
			->whereNotIn('doc_id', $busy_docs)->inRandomOrder()->take(5)->get());
	}
}

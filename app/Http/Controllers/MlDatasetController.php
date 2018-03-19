<?php

namespace TOEcyd\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use TOEcyd\MlDataset;

/**
 * Class MlDatasetController
 * @package TOEcyd\Http\Controllers
 */
class MlDatasetController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$doc_id = $request->doc_id;
		$category = $request->category;
		MlDataset::insertRow($doc_id, $category);
		
		// якщо кінцевим рішенням може бути документ тільки з певної категорії,
		// відносимо його тієї категорії
		switch ($category) {
			case 9:
				MlDataset::insertRow($doc_id, 11);
				break;
			case 16:
				MlDataset::insertRow($doc_id, 18);
				break;
		}
	}
	
	
	
	/**
	 * Determine if the session and input CSRF tokens match.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function tokensMatch($request) {
		// If request is an ajax request, then check to see if token matches token provider in
		// the header. This way, we can use CSRF protection in ajax requests also.
		$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
		
		return $request->session()->token() == $token;
	}
}

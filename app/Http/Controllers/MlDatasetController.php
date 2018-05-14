<?php

namespace TOEcyd\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use TOEcyd\MlDataset;
use TOEcyd\SrcDocument;

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
	 * @return void
	 */
	public function store(Request $request) {

		$doc_id = $request->doc_id;
		$category = $request->category;
		$doc_text = $this->validateText(SrcDocument::getTextById($doc_id));
		if ($doc_text === NULL) {
			return ;
		}
		
		MlDataset::insertRow($doc_id, $category, $doc_text);
		
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
	
	
	
	/**
	 * метод для приведення тексту документу в вигляд
	 * зручний для обробки NLTK
	 * @param $doc_text
	 * @return null|string
	 */
	private function validateText($doc_text) {
		$part_text = [];
		// вирізання тільки резолютивної частини документу
		$r_len = preg_match("/(ЗАСУДИ|ПОСТАНОВИ|ВИРІШИ|УХВАЛИ)\w+:?\n(.+)/ums", $doc_text, $part_text);
		// якщо резолютивної частини немає - помилка
		if ($r_len != 1) {
			return NULL;
		}
		// обрізнання тексту до 600 знаків, якщо текст довгий
		$valid_len_text = mb_substr($part_text[2], 0, 600);
		
		// видалення слів ОСОБА_№, ІНФОРМАЦІЯ_№, АДРЕСА_№, НОМЕР_№
		$valid_text = preg_replace("/ОСОБ\w+,?|ІНФОРМА\w+,?|АДРЕС\w+,?|НОМЕ\w+,?/u", "", $valid_len_text);
		// приведення до нижнього регістру
		$valid_text = mb_strtolower($valid_text);
		// заміна с у д д я => суддя
		$valid_text = preg_replace("/(\w ){4,}\w/u", "суддя", $valid_text);
		// видалення ПІБ судді
		$valid_text = preg_replace("/суддя.+|головуючий.+/u", "", $valid_text);
		// видалення останнього речення
		$valid_text = preg_replace("/(.+[.,])(.+)$/us", "$1", $valid_text);
		// видалення знаків пунктуації
		$valid_text = preg_replace("/[.,:;–-]+/u", "", $valid_text);
		// видалення слів в дужках
		$valid_text = preg_replace("/\(.+\)/u", "", $valid_text);
		// видалення цифр
		$valid_text = preg_replace("/\d+/u", "", $valid_text);
		// видалення сполучників і скорочень
		$valid_text = preg_replace("/\s.{1,3}\s/u", " ", $valid_text);
		// видалення задвоєних пробільних символів
		$valid_text = preg_replace("/\s+/u", " ", $valid_text);
		// повторне видалення сполучників і скорочень
		$valid_text = preg_replace("/\s.{1,3}\s/u", " ", $valid_text);
		// видалення пробільних символів з початку і кінця тексту
		$valid_text = trim($valid_text, " \t\n\r\x0B");
		return($valid_text);
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

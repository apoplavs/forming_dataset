<?php

namespace TOEcyd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use TOEcyd\SrcDocument;

/**
 * Class ChooseCategoryController
 * @package TOEcyd\Http\Controllers
 */
class ChooseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
	 * @return \Illuminate\Contracts\View\Factory|
	 * \Illuminate\View\View
	 */
    public function index() {
    	$category = Input::get('category');
		$type_documents = Input::get('type-documents');

        switch ($category) {
			case 'civil':
				return $this->civil($type_documents);
			case 'criminal':
				return $this->criminal($type_documents);
			case 'commercial':
				return $this->commercial($type_documents);
			case 'admin':
				return $this->admin($type_documents);
			case 'adminoffense':
				return $this->adminoffense($type_documents);
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    
    
    
    // PRIVATE METHODS
	
	
	/**
	 * @param $type_documents
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	private function civil($type_documents) {
    	switch ($type_documents) {
			case 1:
				$doc_set = SrcDocument::civil1();
				$buttons = [
					["name"=> "початок провадження", "val"=> "6"],
					["name"=> "зупинення провадження", "val"=> "7"],
					["name"=> "відновлення провадження", "val"=> "8"],
					["name"=> "кінцеве рішення", "val"=> "9"]
				];
				break;
			case 2:
				$doc_set = SrcDocument::civil2();
				$buttons = [
					["name"=> "задоволено вимоги позивача", "val"=> "10"],
					["name"=> "справу вирішено іншим чином", "val"=> "11"],
					["name"=> "відмовлено у позові", "val"=> "12"]
				];
				break;
		}
//		$doc_set = str_replace("\n", "</br>", $doc_set);
		$doc_set = json_encode($doc_set);
    	$buttons = json_encode($buttons);
		return view('make_dataset', compact('buttons', 'doc_set'));
	}
	
	
	/**
	 * @param $type_documents
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	private function criminal($type_documents) {
		switch ($type_documents) {
			case 1:
				$doc_set = SrcDocument::criminal1();
				$buttons = [
					["name"=> "початок провадження", "val"=> "13"],
					["name"=> "зупинення провадження", "val"=> "14"],
					["name"=> "відновлення провадження", "val"=> "15"],
					["name"=> "кінцеве рішення", "val"=> "16"]
				];
				break;
			case 2:
				$doc_set = SrcDocument::criminal2();
				$buttons = [
					["name"=> "особу притягнено до відповідальності", "val"=> "17"],
					["name"=> "особа звільнена від відповідальності", "val"=> "18"]
				];
				break;
		}
		$doc_set = json_encode($doc_set);
		$buttons = json_encode($buttons);
		return view('make_dataset', compact('buttons', 'doc_set'));
	}
	
	
	private function commercial($type_documents) {
    	return ('Functional has not yet been implemented');
	}
	
	
	private function admin($type_documents) {
		return ('Functional has not yet been implemented');
	}
	
	
	/**
	 * @param $type_documents
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	private function adminoffense($type_documents) {
		switch ($type_documents) {
			case 1:
				$doc_set = SrcDocument::adminoffense1();
				$buttons = [
					["name"=> "початок провадження", "val"=> "1"],
					["name"=> "зупинення провадження", "val"=> "2"],
					["name"=> "відновлення провадження", "val"=> "3"]
				];
				break;
			case 2:
				$doc_set = SrcDocument::adminoffense2();
				$buttons = [
					["name"=> "обвинувачений звільняється від відповідальності", "val"=> "1"],
					["name"=> "на обвинуваченого накладається стягнення", "val"=> "2"]
				];
				break;
		}
		$doc_set = json_encode($doc_set);
		$buttons = json_encode($buttons);
		return view('make_dataset', compact('buttons', 'doc_set'));
	}
}

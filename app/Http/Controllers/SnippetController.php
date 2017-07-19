<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller {

	public function index() {
		$snippets = Snippet::allSnippets();

		return view('snippet.index', compact('snippets'));
	}

	public function create() {
		return view( 'snippet.create' );
	}

	public function store( Request $request ) {

		$this->validate($request, [
			'language' => 'required'
		]);

		$snippet = Snippet::getInstance($request->language)->persist($request);

		return redirect($snippet->route);
	}
}

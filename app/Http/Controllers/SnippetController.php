<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller {
	public function create() {
		return view( 'snippet.create' );
	}

	public function store( Request $request ) {

		$this->validate($request, [
			'language' => 'required'
		]);

		$language = $request->language;

		$snippetClass = "App\\{$language}Snippet";

		$snippet = (new $snippetClass)->persist($request);

		return redirect()->route("{$language}-snippet.show", $snippet);
	}
}

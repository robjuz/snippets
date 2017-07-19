<?php

namespace App\Http\Controllers;

use App\TextSnippet;

class TextSnippetController extends Controller {

	public function index() {
		$snippets = TextSnippet::get();

		return view( 'snippet.index', compact( 'snippets' ) );
	}

	public function show( TextSnippet $snippet ) {
		return view( 'text_snippet.show', compact( 'snippet' ) );
	}
}

<?php

namespace App\Http\Controllers;

use App\ImageSnippet;

class ImageSnippetController extends Controller {

	public function index() {
		$snippets = ImageSnippet::get();

		return view( 'snippet.index', compact( 'snippets' ) );
	}

	public function show( ImageSnippet $snippet ) {
		return view( 'image_snippet.show', compact( 'snippet' ) );
	}
}

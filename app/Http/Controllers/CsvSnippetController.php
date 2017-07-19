<?php

namespace App\Http\Controllers;

use App\CsvSnippet;

class CsvSnippetController extends Controller {

	public function index() {
		$snippets = CsvSnippet::get();

		return view( 'snippet.index', compact( 'snippets' ) );
	}

	public function show( CsvSnippet $snippet ) {
		return view( 'csv_snippet.show', compact( 'snippet' ) );
	}
}

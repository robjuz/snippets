<?php

namespace App\Http\Controllers;

use App\CsvSnippet;
use Illuminate\Http\Request;

class CsvSnippetController extends Controller
{
	public function show(CsvSnippet $snippet ) {
		return view ('snippet.show', compact(['snippet']));
	}
}

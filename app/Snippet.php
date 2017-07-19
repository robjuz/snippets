<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class Snippet extends Model {
	use Uuids;

	public $incrementing = false;
	protected $table = 'snippets';
	protected $fillable = [ 'title', 'body', 'language' ];

	static $languages = [
		'csv' => 'CSV',
		'text' => 'Plain text',
//		'js'  => 'JavaScript',
//		'php' => 'PHP'
	];


	protected static $lookup = [
		'csv' => CsvSnippet::class,
		'text' => TextSnippet::class
	];

	/**
	 * @param $language
	 *
	 * @return mixed
	 */
	public static function getInstance( $language ) {
		return new static::$lookup[ $language ];
	}

	public function getClass( $language ) {
		return static::$lookup[ $language ];
	}

	public static function allSnippets() {
		$snippets = DB::table( 'snippets' )->get();

		return $snippets->map( function ( $snippet ) {
			return isset( static::$lookup[ $snippet->language ] )
				? ( new static::$lookup[ $snippet->language ] )->forceFill(
					json_decode( json_encode( $snippet ), true )
				)
				: false;
		} );
	}


	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	abstract protected function persist( Request $request );

	abstract public function getRouteAttribute();
}

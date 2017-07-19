<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class Snippet extends Model {
	use Uuids, ValidatesRequests;


	public $incrementing = false;
	protected $table = 'snippets';
	protected $fillable = [ 'title', 'body', 'language' ];

	public $validateRules = [
		'title' => 'required',
		'language' => 'required'
	];

	static $languages = [
		'csv'   => CsvSnippet::class,
		'text'  => TextSnippet::class,
		'image' => ImageSnippet::class
	];

	/**
	 * @param $language
	 *
	 * @return mixed
	 */
	public static function getInstance( $language ) {
		return new static::$languages[ $language ];
	}

	public function getClass( $language ) {
		return static::$languages[ $language ];
	}

	public static function allSnippets() {
		$snippets = DB::table( 'snippets' )->get();

		return $snippets->map( function ( $snippet ) {
			return isset( static::$languages[ $snippet->language ] )
				? ( new static::$languages[ $snippet->language ] )->forceFill(
					json_decode( json_encode( $snippet ), true )
				)
				: false;
		} );
	}

	public function getSlugAttribute() {
		return str_slug($this->title);
	}

	public function getTitleAttribute( $value ) {
		return $value ?: 'Untitled';
	}


	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	abstract protected function persist( Request $request );

	/**
	 * @return mixed
	 */
	abstract public function getRouteAttribute();

	/**
	 * @return mixed
	 */
	abstract public static function name();
}

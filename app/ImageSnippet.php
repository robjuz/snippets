<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ImageSnippet extends Snippet {

//	public $validateRules = [
//		'title' => ''
//		'language' => 'required',
////		'file' => 'image'
//	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('language', function (Builder $builder) {
			$builder->whereLanguage('image');
		});
	}

	public function persist( Request $request ) {

		$data = $request->all();

		if ( $request->hasFile( 'file' ) ) {
			$data['body'] = "data:image/jpeg;base64,". base64_encode(file_get_contents(
				$request->file( 'file' )
				        ->getRealPath()
			));
		}

		$this->fill( $data )->save();

		return $this;
	}

	public function getRouteAttribute() {
		return route('image-snippet.show', [$this, $this->slug]);
	}

	public static function name() {
		return 'JPEG, PNG etc.';
	}
}

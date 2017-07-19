<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TextSnippet extends Snippet {

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('language', function (Builder $builder) {
			$builder->whereLanguage('text');
		});
	}

	public function persist( Request $request ) {

		$data = $request->all();

		if ( $request->hasFile( 'file' ) ) {
			$data['body'] = file_get_contents(
				$request->file( 'file' )
				        ->getRealPath()
			);
		}

		$this->fill( $data )->save();

		return $this;
	}

	public function getRouteAttribute() {
		return route('text-snippet.show', $this);
	}
}

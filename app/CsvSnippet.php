<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CsvSnippet extends Snippet {

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('language', function (Builder $builder) {
			$builder->whereLanguage('csv');
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
		return route('csv-snippet.show', [$this, $this->slug]);
	}

	public function setBodyAttribute( $value ) {

		ini_set( 'auto_detect_line_endings', true );
		$stream = fopen( 'php://memory', 'r+' );
		fwrite( $stream, $value );
		rewind( $stream );


		ob_start();
		echo "<table class='table table-bordered table-hover'>";
		while ( ( $line = fgetcsv( $stream ) ) !== false ) {
			echo "<tr>";
			foreach ( $line as $cell ) {
				echo "<td>" . htmlspecialchars( $cell ) . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		$this->attributes['body'] = ob_get_clean();

		ini_set( 'auto_detect_line_endings', false );
	}

	public static function name() {
		return 'CSV';
	}
}

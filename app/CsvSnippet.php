<?php

namespace App;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CsvSnippet extends Snippet {

	public function setBodyAttribute( $value ) {
		$csv = array_map( function ( $line ) {
			return str_getcsv( $line );
		}, explode( "\n", $value ) );


		ob_start();
		echo "<table class='table table-bordered table-hover'>";
		foreach ( $csv as $line ) {
			echo "<tr>";
			foreach ( $line as $cell ) {
				echo "<td>" . htmlspecialchars( $cell ) . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		$this->attributes['body'] = ob_get_clean();
	}

	public function persist( Request $request ) {

		$data = $request->all();

		if ($request->hasFile('file')) {
			$data['body'] = file_get_contents(
				$request->file('file')
				        ->getRealPath()
			);
		}

		$this->fill( $data )->save();
		return $this;
	}
}

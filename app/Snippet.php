<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Snippet extends Model
{
	protected $table = 'snippets';

	use Uuids;

	public $incrementing = false;

	protected $fillable = ['body', 'language'];

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	abstract protected function persist(Request $request);
}

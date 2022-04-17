<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait EventTrait
{
	public function getAttribute($attribute)
	{
		return $this->{$attribute};
	}

}

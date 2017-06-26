<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Pool;

class PoolTransformer extends TransformerAbstract
{

	public function transform(Pool $pool)
	{
		return [
			'name' => $pool->name,
			'address' => $pool->address,
			'city' => $pool->city,
		];
	}
}
<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Route;
use App\Pool;

class RouteTransformer extends TransformerAbstract
{
	/*
	protected $defaultIncludes = [
		'origin',
		'destination'
	];	

	public function includeOrigin(Route $route)
	{
		$origin = $route->origin()->get();
		return $this->collection($origin, new PoolTransformer());
	}

	public function includeDestination(Route $route)
	{
		$destination = $route->destination()->get();
		return $this->collection($destination, new PoolTransformer());
	}
	*/

	public function transform(Route $route)
	{
		return [
			'origin' => $route->origin,
			'destination' => $route->destination,
			'duration' => $route->duration,
		];
	}
}
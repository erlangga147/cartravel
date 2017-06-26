<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use League\Fractal\ParamBag;
use App\Car;

class CarTransformer extends TransformerAbstract
{

	public function transform(Car $car)
	{
		return [
			'license_plate' => $car->license_plate,
			'brand' => $car->brand,
			'year' => $car->year,
			'capacity' => $car->carType->capacity
		];
	}
}
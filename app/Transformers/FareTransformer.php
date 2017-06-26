<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use League\Fractal\ParamBag;
use App\Fare;
use App\CarSchedule;

class FareTransformer extends TransformerAbstract
{
	/*protected $defaultIncludes = [
		'carSchedules'
	];

	public function includeCarSchedules(Fare $fare)
	{
		$carSchedules = $fare->carSchedules()->get();
		return $this->collection($carSchedules, new CarScheduleTransformer());
	}*/

	public function transform(Fare $fare)
	{
		$cartype = $fare->cartype;
		return [
			'id' => $fare->id,
			'departure_time' => $fare->departure_time,
			'price' => $fare->price,
			'capacity per car' => $cartype->capacity,
			'num_of_cars' => $fare->carSchedules()->count()
		];
	}
}
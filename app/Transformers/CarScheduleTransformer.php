<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use League\Fractal\ParamBag;
use App\CarSchedule;
use Illuminate\Support\Facades\DB;

class CarScheduleTransformer extends TransformerAbstract
{

	protected $defaultIncludes = [
		'tickets'
	];

	
	public function includetickets(CarSchedule $carSchedule)
	{

	}

	public function transform(CarSchedule $carSchedule)
	{
		return [
			'id' => $carSchedule->id,
			'license_plate' => $carSchedule->car->license_plate,
			'status' => $carSchedule->status,
			'message' => $carSchedule->message,
		];
	}
}
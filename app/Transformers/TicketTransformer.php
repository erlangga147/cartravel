<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Ticket;

class TicketTransformer extends TransformerAbstract
{

	public function transform(Ticket $ticket)
	{
		return [
			
		];
	}
}
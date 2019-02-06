<?php

namespace App\Exports;

use App\Models\Subscribers;
use Maatwebsite\Excel\Concerns\FromCollection;
class SubscriberExport implements FromCollection
{
  
	public function collection()
	{
	return Subscribers::all();
	}

}

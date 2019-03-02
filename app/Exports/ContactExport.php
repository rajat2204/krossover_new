<?php

namespace App\Exports;

use App\Models\ContactUs;
use Maatwebsite\Excel\Concerns\FromCollection;
class ContactExport implements FromCollection
{
  
	public function collection()
	{
	return ContactUs::all();
	}

}

<?php

namespace App\Exports;

use App\Models\Enquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
class EnquiryExport implements FromCollection
{
  
	public function collection()
	{
	return Enquiry::all();
	}

}

<?php

namespace App\Exports;

use App\Models\Facility;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacilityExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Facility::leftJoin('apt_apply_property', 'facilities.property_id', '=', 'apt_apply_property.id')
        ->select('facilities.*','apt_apply_property.name','apt_apply_property.state','apt_apply_property.city')
        ->get();
    }
}

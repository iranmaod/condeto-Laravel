<?php

namespace App\Exports;

use App\Models\Resource;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResourceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Resource::leftJoin('apt_apply_property', 'resources.building_id', '=', 'apt_apply_property.id')
        ->select('resources.*','apt_apply_property.name')
        ->get();
    }
}

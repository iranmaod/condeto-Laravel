<?php

namespace App\Exports;
use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComplexExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Property::where('type_id',29)->
        select('apt_apply_property.name')->get();
        // Property::
        // join('apt_apply_property as property','apt_apply_property.id', '=','apt_apply_property.parent_property_id')
        // ->select('apt_apply_property.name')
        // ->where('apt_apply_property.type_id',29)
        // ->get();
    }
}

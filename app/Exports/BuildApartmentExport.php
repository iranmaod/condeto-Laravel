<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;

class BuildApartmentExport implements FromCollection
{
protected $id;

 function __construct($id) {
        $this->id = $id;
 }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $id = $this->id;
        return Property::where('parent_property_id',$id)->get();
    }
}

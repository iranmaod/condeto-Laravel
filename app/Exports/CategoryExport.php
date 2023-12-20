<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::leftJoin('apt_apply_property', 'categories.building_id', '=', 'apt_apply_property.id')
        ->select('categories.*','apt_apply_property.name')
        ->get();
    }
}

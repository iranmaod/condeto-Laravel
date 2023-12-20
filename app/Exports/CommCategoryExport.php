<?php

namespace App\Exports;

use App\Models\CommCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\CommunityCategory;
class CommCategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CommunityCategory::leftJoin('apt_apply_property', 'community_categories.object_id', '=', 'apt_apply_property.id')
        ->select('community_categories.*','apt_apply_property.name')
        ->get();
    }
}

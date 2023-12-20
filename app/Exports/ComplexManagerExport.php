<?php

namespace App\Exports;
use App\Models\UserPropertyRelation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComplexManagerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserPropertyRelation::leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')
        ->leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->where('apt_apply_user_property_relationship.type_id',52)
        ->select('apt_apply_property.name','users.first_name','users.last_name', 'apt_apply_types.description as role')
        ->get();
    }
}

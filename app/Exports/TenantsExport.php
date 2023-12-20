<?php

namespace App\Exports;

use App\Models\UserPropertyRelation;
use Maatwebsite\Excel\Concerns\FromCollection;

class TenantsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserPropertyRelation::
		select('apt_apply_user_property_relationship.*','users.email','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')->
		leftJoin('users','users.id','=','apt_apply_user_property_relationship.user_id')->
		leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')->
		leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->take(10)->orderBy('id', 'DESC')->get();
    }
}

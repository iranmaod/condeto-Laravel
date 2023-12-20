<?php

namespace App\Exports;
Use App\Models\Payments;
use Maatwebsite\Excel\Concerns\FromCollection;

class RevenueExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payments::where('status','PAID')
        ->select('apt_apply_property.name','apt_apply_payments.amount_paid','apt_apply_payments.condeto_fee')
        ->leftJoin('users','apt_apply_payments.user_id','=','users.id')
        ->leftJoin('apt_apply_property','apt_apply_payments.object_id','=','apt_apply_property.id')      
        ->get();
    }
}

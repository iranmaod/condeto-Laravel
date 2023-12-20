<?php

namespace App\Exports;

use App\Models\Payments;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payments::leftJoin('apt_apply_property', 'apt_apply_payments.object_id', '=', 'apt_apply_property.id')
        ->select('apt_apply_payments.*','apt_apply_property.name','apt_apply_property.fee')
        ->get();
    }
}

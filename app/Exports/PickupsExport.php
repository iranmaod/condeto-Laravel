<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;

class PickupsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Event::where('type_id',2007)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name')
        ->get();
    }
}

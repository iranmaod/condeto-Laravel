<?php

namespace App\Exports;

use App\Models\Messages;
use Maatwebsite\Excel\Concerns\FromCollection;

class MessageExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Messages::where('type_id',15)->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->select('apt_apply_messages.*','users.first_name','apt_apply_types.description')
        ->paginate(10);
    }
}

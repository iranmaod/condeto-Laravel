<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminUserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::leftJoin('apt_apply_users', 'users.id', '=', 'apt_apply_users.user_id')
        ->where('apt_apply_users.is_super_admin',1)
        ->select('users.email')
        ->get();
    }
}

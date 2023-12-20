<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new User([
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "username" => $row['last_name'],
            "email" => $row['email'],
            "dob" => $row['dob'],
            "phone" => $row['phone'],
            "password" => Hash::make('password'),
            "confirmation_code" => $code = Str::random(20),
            'twitter_url' => 0,
            'google_url' => 0,
            'facebook_url' => 0,
            'phone' => 0,
            'company' => 0,
            'image' => 0,
            'about_me' => 0,
            'work_hours' => 0,
            'view_count' => 0,
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class PropertyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // echo '<pre>';
        // print_r($row);exit;
        return new Property([
            "name" => $row['name'],
            "fee" => $row['fee'],
            "zip" => $row['zip'],
            "state" => $row['state'],
            "city" => $row['city'],
        ]);
    }
}

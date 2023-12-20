<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPropertyRelation extends Model
{
    use HasFactory;
    protected $table   = 'apt_apply_user_property_relationship';
}

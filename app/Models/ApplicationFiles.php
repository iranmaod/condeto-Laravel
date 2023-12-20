<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationFiles extends Model
{
    use HasFactory;
    protected $table   = 'apt_apply_application_files';
    public $timestamps = false;
}

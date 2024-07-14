<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designations extends Model
{
    use HasFactory;
    protected $table = 'hr.designations';
    protected $primaryKey = 'designation_id';
    protected $fillable = [
        'designation_name',
    ];
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'hr.users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name', 'department_id', 'designation_id', 'phone_no'
    ];
    public function getDepartment()
    {
        return $this->hasOne('App\Models\Departments', 'department_id', 'department_id');
    }
    public function getDesignation()
    {
        return $this->hasOne('App\Models\Designations', 'designation_id', 'designation_id');
    }
}

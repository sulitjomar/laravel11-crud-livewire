<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'post', 'avatar'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('first_name', 'like', '%' . $val . '%')
            ->orWhere('last_name', 'like', '%' . $val . '%')
            ->orWhere('email', 'like', '%' . $val . '%')
            ->orWhere('post', 'like', '%' . $val . '%')
            ->orWhere('phone', 'like', '%' . $val . '%');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    // protected $fillable = ['id', 'name', 'address', 'email', 'logo', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
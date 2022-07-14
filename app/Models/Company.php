<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string';
    // protected $fillable = ['id', 'name', 'address', 'email', 'logo', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}

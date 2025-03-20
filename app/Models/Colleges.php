<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colleges extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];
    public function students() {
        return $this->hasMany(Student::class);
    }
}

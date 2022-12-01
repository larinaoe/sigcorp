<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public $fillable = [
        'name'
    ];

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }

}
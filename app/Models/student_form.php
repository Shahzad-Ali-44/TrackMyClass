<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class student_form extends Model
{
    use HasFactory;

    protected $table = 'student_forms';

    protected $fillable = [
        'name',
        'roll_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

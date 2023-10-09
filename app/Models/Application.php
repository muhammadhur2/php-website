<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'justification',
        // ... any other attributes you want to mass assign ...
    ];
    public function student()
{
    return $this->belongsTo(User::class, 'student_id');
}

public function project()
{
    return $this->belongsTo(Project::class);
}

}

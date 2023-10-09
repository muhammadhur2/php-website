<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'inp_name',
        'inp_email',
        'description',
        'students_needed',
        'trimester',
        'year',
    ];

    public function selectedStudents() {
        return $this->belongsToMany(User::class);
    }
    public function files() {
        return $this->hasMany(ProjectFile::class);
    }
    public function applications()
{
    return $this->hasMany(Application::class);
}

    
}

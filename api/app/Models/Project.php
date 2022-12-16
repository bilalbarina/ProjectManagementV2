<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function pre_project()
    {
        return $this->belongsTo(PreProject::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get project progress in percentage.
     * 
     */
    public function progress()
    {
        return get_percentage(
            $this->tasks->count(),
            $this->tasks->sum(fn ($e) => $e->status != 2)
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function pre_projects()
    {
        return $this->hasMany(PreProject::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public static function years()
    {
        return self::all()->map(fn($group) => $group->year_of_study)->unique();
    }
}

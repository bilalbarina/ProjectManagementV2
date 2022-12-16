<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Get student progress.
     * 
     */
    public function stats(Request $request)
    {
        // Get group of the study year.
        $year = $request->get('year');
        if (is_null($year)) {
            $group = Group::latest('year_of_study')->first();
        } else {
            $group = Group::where('year_of_study', $year)->first();
        }

        if (is_null($group) || $group->projects->count() < 1) {
            return response()->json([
                'success' => false,
            ]);
        }

        // Get stats.
        $groupStats = $group
            ?->projects
            ->sum(fn ($project) => $project->progress()) / $group->projects->count();

        $projectsStats = $group
            ?->projects
            ->map(function ($project) {
                return [
                    'title' => $project->title,
                    'progress' => (int) $project->progress(),
                ];
            });

        $studentStats = $group
            ?->students
            ->map(function ($student) {
                return [
                    'name' => $student->first_name . ' ' . $student->last_name,
                    'progress' => (int) $student->progress(),
                ];
            });

        return response()->json([
            'success' => true,
            'title' => $group->title,
            'logo' => $group->logo,
            'year_of_study' => $group->year_of_study,
            'students' => $group->students->count(),
            'stats' => [
                'group' => (int) $groupStats,
                'projects' => $projectsStats,
                'students' => $studentStats,
            ],
        ]);
    }

    /**
     * Get all study years.
     * 
     */
    public function studyYears()
    {
        return response()->json([
            'years' => Group::years()
        ]);
    }
}

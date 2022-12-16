<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\PreProject;
use App\Models\PreTask;
use App\Models\Project;
use App\Models\Student;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create new group.
        $group = new Group([
            'title' => 'CodeCampers',
            'year_of_study' => '2022-2023',
        ]);
        $group->save();

        // Create new student.
        $student = new Student([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'cin' => 'LB289182',
            'dob' => Carbon::parse('12/01/1999'),
            'email' => 'john.doe@gmail.com',
            'group_id' => $group->id,
        ]);
        $student->save();
        
        // Create new pre project.
        $preProject = new PreProject([
            'title' => 'Todo List',
            'group_id' => $group->id,
            'duration' => 86400 // 1 Day
        ]);
        $preProject->save();

        // Create new pre task.
        $preTask = new PreTask([
            'title' => 'Prototypes',
            'pre_project_id' => $preProject->id,
        ]);
        $preTask->save();

        // Create new project.
        $project = new Project([
            'pre_project_id' => $preProject->id,
            'group_id' => $group->id,
            'student_id' => $student->id,
        ]);
        $project->save();

        // Create new task.
        $task = new Task([
            'pre_task_id' => $preTask->id,
            'project_id' => $project->id,
            'student_id' => $student->id,
            'status' => 0,
        ]);
        $task->save();
    }
}

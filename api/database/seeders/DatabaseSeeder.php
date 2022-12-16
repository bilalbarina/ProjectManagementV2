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
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (['2021-2022', '2022-2023'] as $i => $year) {
            // Create new group.
            $group = new Group([
                'title' => "Group " . $i + 1,
                'year_of_study' => $year,
            ]);
            $group->save();

            // Create new pre project.
            $preProject = new PreProject([
                'title' => fake()->company,
                'group_id' => $group->id,
                'duration' => 86400 // 1 Day
            ]);
            $preProject->save();

            // Create new pre tasks.
            for ($i = 0; $i <= 5; $i++) {
                $preTask = new PreTask([
                    'title' => "Task $i",
                    'pre_project_id' => $preProject->id,
                ]);
                $preTask->save();
                $preTasks[] = $preTask->id;
            }

            // Create new students.
            for ($i = 0; $i <= 5; $i++) {
                $student = new Student([
                    'first_name' => fake()->firstName,
                    'last_name' => fake()->lastName,
                    'cin' => Str::random(8),
                    'dob' => Carbon::parse('12/01/1999'),
                    'email' => fake()->email,
                    'group_id' => $group->id,
                ]);
                $student->save();

                // Create new relation project.
                $project = new Project([
                    'pre_project_id' => $preProject->id,
                    'group_id' => $group->id,
                    'student_id' => $student->id,
                ]);
                $project->save();

                // Create new task.
                $task = new Task([
                    'pre_project_id' => $preProject->id,
                    'pre_task_id' => $preTasks[$i],
                    'project_id' => $project->id,
                    'student_id' => $student->id,
                    'status' => 2,
                ]);
                $task->save();
            }
        }
    }
}

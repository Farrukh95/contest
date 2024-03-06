<?php

namespace App\Algorithms;

use App\Models\Module;
use App\Models\Student;
use Illuminate\Support\Collection;

class AlgorithmByApplicationDate
{
    public function distributeStudents(Collection $students, Collection $modules): Collection
    {
        $studentsInModules = collect();
        $studentsOnFreeModules = collect();

        foreach ($students as $student) {
            if ($student->application) {
                $this->distributeStudentWithApplication($student, $modules, $studentsInModules);
            } else {
                $this->distributeStudentOnFreeModules($student, $modules, $studentsOnFreeModules);
            }
        }

        return $studentsInModules->sortBy('application_date')->merge($studentsOnFreeModules);
    }

    // Распределение студентов у которых есть заявки
    private function distributeStudentWithApplication(Student $student, Collection $modules, Collection &$studentsInModules)
    {
        $application = $student->application;
        $modulePriority1 = $application->module_priority_1;
        $modulePriority2 = $application->module_priority_2;

        foreach ($modules as $module) {
            if (($module->id == $modulePriority1 || $module->id == $modulePriority2) && $module->is_open) {
                $this->addToDistributionList($studentsInModules, $student, $module, $application->application_date);
                break;
            }
        }
    }

    // Распределение студентов у которых нет заявки на свободные модули
    private function distributeStudentOnFreeModules(Student $student, Collection $modules, Collection &$studentsOnFreeModules)
    {
        foreach ($modules as $module) {
            if ($module->module_type_id === 3) {
                $this->addToDistributionList($studentsOnFreeModules, $student, $module, null);
                break;
            }
        }
    }

    private function addToDistributionList(Collection &$studentsList, Student $student, Module $module, ?string $applicationDate)
    {
        $studentsList->push([
            'academic_year' => $student->group->academic_year->name,
            'school_id' => $module->school->id,
            'name' => $student->fio,
            'module_id' => $module->id,
            'module_name' => $module->name,
            'disciplines' => $module->disciplines,
            'module_type' => $module->moduleType->name,
            'application_date' => $applicationDate,
        ]);
    }
}


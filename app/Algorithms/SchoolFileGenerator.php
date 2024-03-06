<?php

namespace App\Algorithms;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;


class SchoolFileGenerator
{
    public function generateFiles(Collection $data, $type): void
    {
        switch ($type) {
            case 'txt':
                $this->generateTxtFile($data);
                break;
            default:
                $this->generateExclFile($data);
        }
    }


    public function generateTxtFile($data)
    {
        $groupedData = $data->groupBy('school_id');

        foreach ($groupedData as $schoolId => $items) {
            $filename = 'school_' . $schoolId . '_students.txt';

            $fileContent = '';

            foreach ($items as $item) {
                if (isset($item['disciplines'])) {
                    foreach ($item['disciplines'] as $discipline) {
                        $fileContent .= $item['academic_year'] . "\t" . $discipline['semester'] . "\t" . $discipline['id'] . "\t" . $schoolId . "\n";
                    }
                }
            }

            // Сохранение файла в папке storage/app/files
            try {
                Storage::put('files/' . $filename, $fileContent);
            } catch (\Exception $e) {
                \Log::error('Ошибка при сохранении файла: ' . $e->getMessage());
            }
        }
    }

    public function generateExclFile($data)
    {
        $groupedData = $data->groupBy('school_id');

        foreach ($groupedData as $schoolId => $items) {
            $filename = 'school_' . $schoolId . '_students.xlsx';

            $rows = [];
            foreach ($items as $item) {
                foreach ($item['disciplines'] as $discipline) {
                    $rows[] = [
                        $item['academic_year'],
                        $discipline['semester'],
                        $discipline['id'],
                        $schoolId
                    ];
                }
            }

            Excel::store(collect($rows), 'public/files/' . $filename);
        }

    }
}

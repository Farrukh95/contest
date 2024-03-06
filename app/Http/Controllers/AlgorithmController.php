<?php

namespace App\Http\Controllers;

use App\Algorithms\AlgorithmByApplicationDate;
use App\Algorithms\SchoolFileGenerator;
use App\Models\Module;
use App\Models\Student;
use App\Repositories\Module\ModuleRepository;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlgorithmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Algorithm/IndexAlgorithm');
    }


    public function algorithmByApplicationDate(Request $request)
    {

        $algorithm = new AlgorithmByApplicationDate();

        $modules = (new ModuleRepository(new Module()))->all();
        $students = (new StudentRepository(new Student()))->all();

        $data = $algorithm->distributeStudents($students, $modules);

        $type = $request->type;
        $generateFile = new SchoolFileGenerator();

        $generateFile->generateFiles($data, $type);

        return redirect()->back()->with('message', 'Файл успешно сохранен!');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\CreateApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Contest;
use App\Models\Module;
use App\Models\Student;
use App\Repositories\Application\ApplicationRepository;
use App\Repositories\Contest\ContestRepository;
use App\Repositories\Module\ModuleRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    protected $applictionRepository;

    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->applictionRepository = $applicationRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = ApplicationResource::collection($this->applictionRepository->all());

        return Inertia::render('Application/IndexApplication', [
            'applications' => $applications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        $modules = (new ModuleRepository(new Module()))->getFilteredModules(3);

        $contests = (new ContestRepository(new Contest()))->all();


        return Inertia::render('Application/CreateApplication', [
            'modules' => $modules,
            'contests' => $contests,
            'student' => $student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Student $student, CreateApplicationRequest $request)
    {
        $data = $request->validated();

        $this->applictionRepository->create([
            'student_id' => $student->id,
            'contest_id' => $data['contest_id'],
            'module_priority_1' => $data['module_priority_1'],
            'module_priority_2' => $data['module_priority_2'],
            'application_date' => Carbon::now(),
        ]);

        return redirect()->back()->with('message', 'Данные успешно сохранены');
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

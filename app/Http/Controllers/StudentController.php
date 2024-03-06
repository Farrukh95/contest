<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Group;
use App\Models\QuoteType;
use App\Repositories\Group\GroupRepository;
use App\Repositories\QuoteType\QuoteTypeRepository;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{

    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentResource::collection($this->studentRepository->all());

        return Inertia::render('Student/IndexStudent', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupRepository = new GroupRepository(new Group());
        $groups = $groupRepository->all();
        return Inertia::render('Student/CreateStudent', [
            'groups' => $groups,
            'quote_types' => (new QuoteTypeRepository(new QuoteType()))->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentRequest $request)
    {
        $data = $request->validated();

        $this->studentRepository->create($data);

        return redirect()->back()->with('message', 'Студент успешно добавлен!');
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

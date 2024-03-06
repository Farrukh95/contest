<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contest\CreateContestRequest;
use App\Http\Resources\ContestResource;
use App\Repositories\Contest\ContestRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ContestController extends Controller
{
    protected $contestRepository;

    public function __construct(ContestRepository $contestRepository)
    {
        $this->contestRepository = $contestRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contests = ContestResource::collection($this->contestRepository->all());

        return Inertia::render('Contest/IndexContest', [
            'contests' => $contests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Contest/CreateContest');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContestRequest $request)
    {
        $data = $request->validated();

        $this->contestRepository->create([
            'name' => $data['name'],
            'date_start' => $data['date_start'],
            'date_end' => $data['date_end'],
        ]);

        return Redirect::back()->with('message', 'Запись успешно сохранена.');


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
        $this->contestRepository->delete($id);

        return redirect()->back()->with('message', 'Запись успешно удалена!');
    }
}

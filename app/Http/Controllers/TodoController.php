<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $todos = Todo::query()->select(['id', 'title', 'due_date', 'created_at'])->paginate(10);

        return view('todo.index', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        request()->user()->todos()->create([
            ...$data,
            'due_date' => Carbon::createFromDate($data['due_date'])->toDateTimeString()
        ]);

        return Redirect::route('todo.index')->with('status', 'profile-updated');
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

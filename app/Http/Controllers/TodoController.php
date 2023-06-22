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
    public function index(Request $request): View
    {
        $todos = Todo::query()->select(['id', 'title', 'due_date', 'created_at'])->paginate(10);

        return view('todo.index', [
            'todos' => $todos,
        ]);
    }

    public function create(): View
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        request()->user()->todos()->create([
            ...$data,
            'due_date' => Carbon::createFromDate($data['due_date'])->toDateTimeString()
        ]);

        return Redirect::route('todo.index')->with('status', 'todo-created');
    }


    public function show(Todo $todo): View
    {
        return view('todo.show', [
            'todo' => $todo
        ]);
    }

    public function edit(Todo $todo): View
    {
        return view('todo.edit', [
            'todo' => $todo
        ]);
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

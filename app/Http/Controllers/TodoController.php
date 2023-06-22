<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Policies\TodoPolicy;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class TodoController extends Controller
{
    public function __construct(protected TodoPolicy $policy)
    {
    }

    public function index(Request $request): View
    {
        $todos = Todo::query()->select(['id', 'title', 'due_date', 'is_completed', 'created_at'])
            ->where('user_id', $request->user()->getAttribute('id'))
            ->paginate(10);

        return view('todo.index', ['todos' => $todos]);
    }

    public function create(): View
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request): RedirectResponse
    {
        $request->user()->todos()->create($request->validated());

        return Redirect::route('todo.index')->with('status', 'todo-created');
    }


    public function show(Request $request, Todo $todo): View
    {
        abort_if(!$this->policy->view($request->user(), $todo), StatusCode::HTTP_FORBIDDEN);

        return view('todo.show', [
                'todo' => $todo
            ]);
    }

    public function edit(Todo $todo, Request $request): View
    {
        abort_if(!$this->policy->update($request->user(), $todo), StatusCode::HTTP_FORBIDDEN);

        return view('todo.edit', [
            'todo' => $todo
        ]);
    }

    public function update(TodoRequest $request, Todo $todo): RedirectResponse
    {
        abort_if(!$this->policy->update($request->user(), $todo), StatusCode::HTTP_FORBIDDEN);

        $todo->update($request->validated());

        return Redirect::route('todo.show', $todo->getAttribute('id'))->with('status', 'todo-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo, Request $request): RedirectResponse
    {
        abort_if(!$this->policy->delete($request->user(), $todo), StatusCode::HTTP_FORBIDDEN);

        $todo->delete();

        return Redirect::route('todo.index')->with('status', 'todo-created');
    }
}

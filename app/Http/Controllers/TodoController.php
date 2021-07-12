<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Find a specific note by `id`.
     *
     * @param int $id
     * @return Response
     */
    public function showById($id){
        return Todo::findOrFail($id);
    }

    /**
     * Get all the todos
     *
     * @return Response
     */
    public function all(){
        return Todo::where('deleted_at', null)->get();
    }

    /**
     * Insert new todo into the DB.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $todo = new Todo;

        $todo->fill($request->all());
        $todo->save();
    }

    /**
     * Update a todo.
     *
     * @param Request $request
     * @return Response
     */
    public function update($id) {
        $todo = Todo::findOrFail($id);
        $todo->fill($request->all());
        $todo->save();
    }

    /**
     * Soft-delete an existing todo
     * 
     * @param Request $request
     * @return Response
     */
    public function destroy($id) {
        Todo::destroy($id);
    }

}

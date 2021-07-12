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
    public function show($id){
        $content = Todo::find($id);

        if ($content) {
            return response()->json($content, 200);
        }

        return response()->json($content, 404);
    }

    /**
     * Get all the todos
     *
     * @return Response
     */
    public function all(){
        $content = Todo::where('deleted_at', null)->get()->toJson();
        $status = 200;

        return response()->json($content, $status);
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
        $status = 201;
        return response()->json(null, $status);
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
        $status = 201;
        return response()->json(null, $status);
    }

    /**
     * Soft-delete an existing todo
     * 
     * @param Request $request
     * @return Response
     */
    public function destroy($id) {

        $numberOfDeletedItems = Todo::destroy($id);

        if ($numberOfDeletedItems > 0) {
            return response()->json(null, 201);
        }

        return response()->json(null, 404);
    }

}

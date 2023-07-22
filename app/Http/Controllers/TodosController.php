<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
    * index = para mostrar todos los Todos
    * store = para guardar un Todo
    * update = para actualizar un Todo
    * destroy = para eliminar un Todo
    * edit = para mostrar el formulario de edición
    */

    public function store(Request $request){   //VALIDAMOS
        $request -> validate([
            'title' => 'required|min:3',
            'textTodo' => 'required|min:5'     //resyticcones del campo input
        ]);

        $todo = new Todo();                     // CREAMOS LOS OBJETOS Y LE ASIGNAMOS VALORES
        $todo -> title = $request->title;
        $todo -> textTodo = $request->textTodo;
        $todo ->save(); //metodo que guarda información de la variable

        return redirect()-> route('todos')->with('success', 'Tarea creada correctamente'); // REDIRECT AL USUARIO A LA RUTA 'TODOS'
    }

    public function index(){
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos ]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo ]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo ->title = $request->title;
        $todo ->textTodo = $request->textTodo;
        $todo ->save();

        // return view('todos.index', ['success' => 'Tarea Actualizada' ]);
        return redirect()->route('todos')->with('success', 'Tarea Actualizada');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo ->delete();
        return redirect()->route('todos')->with('success', 'Tarea Eliminada');
    }
}

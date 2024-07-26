<?php

namespace App\Http\Controllers;

use App\Http\Functions\GetTodoHandler;
use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function get(Request $req) {
        return GetTodoHandler::Execute($req);
    }

    public function delete() {

    }


}

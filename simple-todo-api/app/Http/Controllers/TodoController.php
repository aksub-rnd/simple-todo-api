<?php

namespace App\Http\Controllers;

use App\Http\Functions\GetTodoHandler;
use App\Http\Functions\DeleteTodoHandler;
use App\Http\Functions\PostTodoHandler;
use App\Http\Functions\PutTodoHandler;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function get(Request $req) {
        return GetTodoHandler::Execute($req);
    }

    public function post(Request $req) {
        return PostToDoHandler::Execute($req);
    }

    public function put(Request $req) {
        return PutTodoHandler::Execute($req);
    }

    public function delete(Request $req, $id) {
        return DeleteTodoHandler::Execute($req, $id);
    }


}

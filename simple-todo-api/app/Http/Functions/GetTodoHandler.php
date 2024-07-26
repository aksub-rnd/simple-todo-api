<?php

namespace App\Http\Functions;

use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class GetTodoHandler {
    static function Execute(Request $req) {
        try {
            $todo = Todo::select("id", "title", "status")->get();

            return response()->json([
                "status" => 200,
                "msg" => "Success",
                "data" => $todo
            ]);
        }
        catch (\Exception $ex) {
            return response()->json([
                "status" => 500,
                "msg" => "Internal server error!",
            ]);
        }
    }
}

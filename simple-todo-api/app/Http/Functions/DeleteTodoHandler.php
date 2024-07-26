<?php

namespace App\Http\Functions;

use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class DeleteTodoHandler {
    static function Execute(Request $req, $id) {
        try {
            $todo = Todo::where("id", $id)->first();

            if ($todo == null) {
                return response()->json([
                    "status" => 404,
                    "msg" => "Todo with id {$id} not found!",
                ]);
            }

            $todo->delete();

            return response()->json([
                "status" => 200,
                "msg" => "Success delete todo with id {$id}!",
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

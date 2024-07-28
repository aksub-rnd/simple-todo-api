<?php

namespace App\Http\Functions;

use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class PutTodoHandler {
    static function Execute(Request $req, $id) {
        try {
            $req->validate([
                'title'=>'nullable',
                'status'=>'nullable|boolean'
            ]);

            $todo = Todo::find($id);
            if($todo==null){
                return response()->json([
                    "status" => 404,
                    "msg" => "Todo with id {$id} not found!"
                ]);
            }

            $title=$req->title;
            $status=$req->status;

            if ($title == null||$status===null) {
                return response()->json([
                    "status" => 400,
                    "msg" => ["Title required!", "Status must be a boolean!"]
                ]);
            }

            $todo->update([
                'title' => $title,
                'status' => $status
            ]);

            return response()->json([
                "status" => 200,
                "msg" => "Success",
                "data" => [
                    "id" => $id,
                    "title" => $todo->title,
                    "status" => $todo->status
                ]
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

<?php

namespace App\Http\Functions;

use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class PostTodoHandler {
    static function Execute(Request $req) {
        try {
            $req->validate([
                'title'=>'nullable',
                'status'=>'nullable'
            ]);
            if ($req->title == null) {
                return response()->json([
                    "status" => 400,
                    "msg" => "Title required!",
                ]);
            }
            $status=$req->status;
            if ($status == null) {
                $status= false;
            }
            $todo = Todo::create([
                'title' => $req->title,
                'status' => $status
            ]);

            return response()->json([
                "status" => 200,
                "msg" => "Success",
                "data" => $todo
            ]);
        }
        catch (\Exception $ex) {
            return response()->json([
                "status" => 500,
                "msg" => $ex,
            ]);
        }
    }
}

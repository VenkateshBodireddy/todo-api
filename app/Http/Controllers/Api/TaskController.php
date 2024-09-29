<?php

namespace App\Http\Controllers\Api;

use App\Models\Task; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request){
        $tasks = Task::all();

        if($tasks->count() >0){
          return response()->json([
            'status'=>200,
            'tasks'=> $tasks
          ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'No records found'
              ],404);
        }
    }
    public function store(Request $request){
      $validator = Validator::make($request->all(),[
         'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
      ]);

      if($validator->fails()){
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ],400);
      }else{
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed,
        ]);
        if($task){

            return response()->json([
                'status'=>200,
                'message'=>'Task Created Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 500,
                'message' =>'Something went wrong'
            ],500);
        }
      }
    }

    public function show($id){
      $task = Task::find($id);
      if($task){
         return response()->json([
            'status'=>200,
            'data'=>$task
         ],200);
      }else{
        return response()->json([
            'status'=>404,
            'data'=>'Data Not Foubd'
         ],404);
      }
    }
    public function edit($id){
        $task = Task::find($id);
        if($task){
           return response()->json([
              'status'=>200,
              'data'=>$task
           ],200);
        }else{
          return response()->json([
              'status'=>404,
              'data'=>'Data Not Foubd'
           ],404);
        }
    }

    public function update(Request $request,int $id){
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
               'description' => 'nullable|string',
               'completed' => 'boolean',
         ]);
   
         if($validator->fails()){
           return response()->json([
               'status'=>400,
               'errors'=>$validator->messages()
           ],400);
         }else{
            $task = Task::find($id);
           if($task){
                $task->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'completed' => $request->completed,
                ]);
               return response()->json([
                   'status'=>200,
                   'message'=>'Task Updated Successfully'
               ],200);
           }else{
               return response()->json([
                   'status' => 404,
                   'message' =>'No Task Available'
               ],404);
           }
         }
    }
  public function destroy($id){
    $task = Task::find($id);
    if($task){
      $task->delete();
      return response()->json([
        'status' => 200,
        'message' => 'Task Deleted Successfully'
      ],200);
    }else{
        return response()->json([
            'status' => 404,
            'message' =>'No Task Available'
        ],404);
    }
  }
}

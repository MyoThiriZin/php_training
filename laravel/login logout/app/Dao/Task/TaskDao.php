<?php

namespace App\Dao\Task;

use App\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;

class TaskDao implements TaskDaoInterface
{
  public function saveTask(Request $request)
  {
    $task = new Task();
    $task->name = $request['name'];
    $task->save();
    return $task;
  }

  public function getTaskList()
  {
    $tasks = Task::all();
    return $tasks;
  }

  public function deleteTaskById($id)
  {
    $task = Task::find($id);
    $task->delete();
    return 'Deleted Successfully!';
  }

}

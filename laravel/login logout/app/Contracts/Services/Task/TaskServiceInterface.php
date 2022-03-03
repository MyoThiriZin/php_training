<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

interface TaskServiceInterface
{
  public function saveTask(Request $request);

  public function getTaskList();

  public function deleteTaskById($id);

}

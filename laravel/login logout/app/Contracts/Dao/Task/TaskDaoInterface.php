<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

interface TaskDaoInterface
{
  public function saveTask(Request $request);

  public function getTaskList();

  public function deleteTaskById($id);
}

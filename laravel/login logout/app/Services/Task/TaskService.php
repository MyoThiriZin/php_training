<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;


class TaskService implements TaskServiceInterface
{

  private $taskDao;

  public function __construct(TaskDaoInterface $taskDao)
  {
    $this->taskDao = $taskDao;
  }

  public function saveTask(Request $request)
  {
    return $this->taskDao->saveTask($request);
  }

  public function getTaskList()
  {
    return $this->taskDao->getTaskList();
  }

  public function deleteTaskById($id)
  {
    return $this->taskDao->deleteTaskById($id);
  }
}

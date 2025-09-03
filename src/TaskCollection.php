<?php

namespace Mishtu\TodoApp;

use Carbon\Carbon;

class TaskCollection
{
    private array $tasks = [];

    public function addTask(Task $task)
    {
        $this->tasks[] = $task;
    }

    public function getAllTasks(): array
    {
        return $this->tasks;
    }

    public function removeTask($id) {
        foreach($this->tasks as $task) {
            if($task->getId() === $id) {
                unset($this->task);
                $this->tasks = array_values($this->tasks);
            }
        }
    }

    public function filterByStatus(string $status)
    {
        $filtered = [];

        foreach ($this->tasks as $task) {
            if ($task->getStatus() === $status) {
                $filtered[] = $task;
            }
        }
        return $filtered;
    }

    public function getOverdueTasks()
    {
        $filtered = [];

        foreach ($this->tasks as $task) {
            if ($task->getDeadline()->lt(Carbon::now())) {
                $filtered[] = $task;
            }
        }
        return $filtered;
    }
}

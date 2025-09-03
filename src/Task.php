<?php

namespace Mishtu\TodoApp;

use Carbon\Carbon;

class Task
{
    private string $id;
    private string $title;
    private Carbon $deadline;
    private string $status;

    public function __construct(string $title, \DateTime $deadline, string $status)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->deadline = Carbon::instance($deadline);
        $this->status = $status;
    }

    public function markAsDone(): void
    {
        $this->status = "done";
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDeadline(): Carbon
    {
        return $this->deadline;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDeadlineInfo(): string
    {
        $daysLeft = (int) $this->deadline->diffInDays(Carbon::now(), false);

        if ($this->status === "done") {
            return "✅ " . rtrim($this->title, '.') . " - выполнено\n";
        } else {
            return "⏳ " . rtrim($this->title, '.') . $this->formatDeadline($daysLeft);
        }
    }

    // Выбираем правильное склонение в зависимости от числа оставшихся дней
    private function getRightDeclension(int $daysLeft): string
    {
        $absNumber = abs($daysLeft);
        $lastTwoDigits = $absNumber % 100; // чтобы ловить 11–14
        $lastDigit = $absNumber % 10;

        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 14) {
            return " дней";
        } elseif ($lastDigit === 1) {
            return " день";
        } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
            return " дня";
        } else {
            return " дней";
        }
    }

    // Возвращаем количество дней до дедлайна
    private function formatDeadline($daysLeft)
    {
        if ($daysLeft < 0) {
            return " - дедлайн через " . abs($daysLeft) . $this->getRightDeclension($daysLeft) . "\n";
        } elseif ($daysLeft > 0) {
            return " - дедлайн наступил " . abs($daysLeft) . $this->getRightDeclension($daysLeft) . " назад\n";
        } else {
            return " - дедлайн сегодня!\n";
        }
    }
}

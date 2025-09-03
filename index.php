<?php
require __DIR__ . '/vendor/autoload.php';

use Mishtu\TodoApp\Task;
use Faker\Factory;

$faker = Factory::create('ru_RU');

$task = new Task(
    $faker->sentence(rand(3, 10)),
    $faker->dateTimeBetween('-2 weeks', '+2 weeks'),
    'in progress'
);


?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>ToDo List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
          <h1>Список задач</h1>
  <ul>
    <li><? ?></li>
  </ul>
    </body>
</html>
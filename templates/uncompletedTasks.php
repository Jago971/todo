<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>ToDoList</title>
    <link rel="stylesheet" href="/styles.css" />
    <script src="/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="BG-circle"></div>
<div class="BG-circle"></div>
<div class="wrap flex">
    <h1>UNCOMPLETED TASKS</h1>
    <a href="/taskZ/completed"><button>COMPLETED</button></a>
    <form class="flex" action="/taskZ" method="post">
<!--        changed url-->
        <label class="flex">
            <textarea id="description" name="description"></textarea>
        </label>
        <input type="submit" value="ADD">
    </form>
    <div class="task-container">
        <?php
        foreach ($tasks as $task) {
            echo "<div class='task'>";
            echo "<p>".$task['description']."</p>";

            echo "<button class='complete' data-id='".$task['id']."'>COMPLETE</button>";
            echo "<button class='delete' data-id='".$task['id']."'>DELETE</button>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
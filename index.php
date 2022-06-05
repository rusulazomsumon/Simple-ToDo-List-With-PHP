<?php 
    require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ToDo List with PHP & MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Geneva';">Simple ToDo List</h2>
        <p style="font-style: 'Geneva';">Developed with PHP&MySQL</p>
	</div>
	<form method="post" action="index.php" class="input_form">
    <?php if (isset($errors)) { ?>
        <p><?php echo $errors; ?></p>
    <?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>

    <div class="tbl">
        <table>
            <caption>Pending Task.</caption>
        <thead>
                <tr> 
                    <th>SI.</th>
                    <th>Tasks</th>
                    <th style="width: 60px;">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                // select all tasks if page is visited or refreshed
                $tasks = mysqli_query($db, "SELECT * FROM todo_task");

                $i = 1; 
                while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td class="task"> <?php echo $row['task']; ?> </td>
                        <td class="delete"> 
                            <a href="index.php?del_task=<?php echo $row['id'] ?>">Done</a> 
                        </td>
                    </tr>
                <?php $i++; } ?>	
            </tbody>
        </table>
    </div>
</body>
</html>
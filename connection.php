<?php 
    // initialize errors variable
	$errors = "";

	/* connect to database, Our database name is projects, and 
	it has a table named "todo_task" with 2 filed, "id" and "task"*/
	$db = mysqli_connect("localhost", "root", "", "projects");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO todo_task (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
	}	
    // delete task or complete task 
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];

        mysqli_query($db, "DELETE FROM todo_task WHERE id=".$id);
        header('location: index.php');
    }

?>
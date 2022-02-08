<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Set Assignment</title>
        <link rel = "stylesheet" href = "\css\design.css">
    </head>

    <body>
        <div class = "sidenav">
            Dashboard<br><br>
            <a href = "pupils.php">Pupils</a>
            <a href = "setassignment.php">Assignment</a>
            <a href = "results.php">Results</a>
            <a href = "reports.php">Reports</a>
        </div>

		<div class = "main">
			<h1>KINDER CARE CHARACTER DRAW SYSTEM</h1>
			<h2>Set Assignments</h2>

			<table>
				<tr>
					<th>Assignment ID</th>
					<th>Start</th>
					<th>End</th>
					<th>Characters</th>
					<th>Action</th>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>

			<form name = "setassignment" method = "post" action = "setassignment.php">
				<label>Asignnment ID</label><br>
				<input type = "text" id = "assignmnentid" name = "assignmnentid"><br><br>
                <label>Start</label><br>
				<input type = "datetime-local" id = "start" name = "start"><br><br>
				<label>End</label><br>
				<input type = "datetime-local" id = "end" name = "end"><br><br>
				<label>Characters</label><br>
					<select name = "characters" id = "characters" multiple>
						<option value = "A">A</option>
						<option value = "B">B</option>
						<option value = "C">C</option>
						<option value = "D">D</option>
						<option value = "E">E</option>
						<option value = "F">F</option>
						<option value = "G">G</option>
						<option value = "H">H</option>
						<option value = "I">I</option>
						<option value = "J">J</option>
						<option value = "K">K</option>
						<option value = "L">L</option>
						<option value = "M">M</option>
						<option value = "N">N</option>
						<option value = "O">O</option>
						<option value = "P">P</option>
						<option value = "Q">Q</option>
						<option value = "R">R</option>
						<option value = "S">S</option>
						<option value = "T">T</option>
						<option value = "U">U</option>
						<option value = "V">V</option>
						<option value = "W">W</option>
						<option value = "X">X</option>
						<option value = "Y">Y</option>
						<option value = "Z">Z</option>
					</select><br><br>
				<input type = "submit" value = "Submit">
				<input type = "reset" value = "Clear All">
			</form>

			
            <!--<?php
                $con = mysqli_connect("DB_CONNECTION", "DB_USERNAME", "DB_PASSWORD", "DB_DATABASE");

                if(!$con) {
                    die(mysqli_connect_error());
                }

                //mysqli_query(
                    $con(
                    "INSERT INTO `DB_DATABASE` (
                        `Assignment ID`,
                        `Start`,
                        `End`,
                        `Characters`
                    )
                    VALUES (
                        {$_POST['assignmnentid']},
                        '{$_POST['start']}',
                        '{$_POST['end']}',
                        '{$_POST['characters']}')"
                    );
            ?>
		</div>
	</body>
</html>

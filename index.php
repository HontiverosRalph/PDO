<!--SHOW CODE DEMONSTRATING FETCH_ALL(). USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN-->
<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch All Patients</title>
</head>
<body>
    <h1>Patients List</h1>
    <?php
    try {
        $stmt = $pdo->prepare("SELECT * FROM patients");

        if ($stmt->execute()) {
            echo "<pre>"; 
            print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
            echo "</pre>";
        } else {
            echo "Error executing query.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>

<!--SHOW CODE DEMONSTRATING HOW FETCH() IS USED. USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN-->
<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $stmt = $pdo -> prepare("SELECT * FROM patients");

    if ($stmt -> execute()) {
        echo "<pre>";
        print_r($stmt -> fetch());
        echo "<pre>";
    }
    ?>
</body>
</html>


<!--SHOW CODE DEMONSTRATING INSERTION OF RECORD TO YOUR DATABASE-->
<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $query = "INSERT INTO patients (patientID, FirstName, LastName, dateofbirth, Gender, contactInfo) VALUES (?,?,?,?,?)";
    
    $stmt = $pdo -> prepare($query);
    $executeQuery = $stmt -> execute(
        [1, 'John', 'Doe', '1990-05-15', 'Male', 'john.doe@gmail.com']);

        if ($executeQuery) {
            echo "Query successful!";
        }else {
            echo "Query failed!";
        }
    ?>
</body>
</html>

<!--SHOW CODE DEMONSTRATING DELETION OF RECORD TO YOUR DATABASE-->
<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $query = "DELETE FROM patients WHERE id = 1";
        $stmt = $pdo -> prepare($query);

        $executeQuery = $stmt -> execute();

            if ($executeQuery) {
                echo "Deletion Successful!";
            }else {
                echo "Query failed!";
            }
    ?>
</body>
</html>

<!--SHOW CODE DEMONSTRATING UPDATING OF RECORD FROM YOUR DATABASE-->
<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $query = "UPDATE patients 
                    SET name = ?
                    WHERE patients = 1
                    ";

            $stmt = $pdo->prepare($query);

            $executeQuery = $stmt->execute(
                ["awsdfjk"]
            );

            if ($executeQuery) {
                echo "Update successful!";
            }
            else {
                echo "Query failed";
            }
    ?>
</body>
</html>

<!--SHOW CODE DEMONSTRATING AN SQL QUERY’S RESULT SET IS RENDERED ON AN HTML TABLE-->
<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $query = "SELECT name, DateOfBirth FROM patients";

        $stmt = $pdo->prepare($query);
        $executeQuery = $stmt->execute();

        if ($executeQuery) {
            $members = $stmt->fetchAll();
        }

        else {
            echo "Query failed";
        }
    ?>

    	<table>
		<tr>
			<th>Name</th>
			<th>Join Date</th>
		</tr>
		<?php foreach ($members as $row) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['join_date']; ?></td>
		</tr>
		<?php } ?>
	</table> 
</body>
</html>

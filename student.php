<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Kết nối thất bại: " . $conn->connect_error);
}
if (isset($_POST['firstname'])) {
	$sql = "UPDATE Student
	SET firstname = '".$_POST['firstname']."', lastname= '".$_POST['lastname']."', email ='".$_POST['email']."'
	WHERE id =".$_POST['id'];
	$conn->query($sql);
	header("Location: http://localhost/demoMySQL/student.php");
	die();
}
if(isset($_GET['action']) && $_GET['action']=='delete'){
	$id = $_GET['id'];
	$sql = "DELETE FROM Student
	WHERE id =".$id;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo MysQL</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="text-center">Thông tin sinh viên</h4>
					<?php
					// $sql = "SELECT * FROM Student";
					// $result = $conn->query($sql);

					// if ($result->num_rows > 0) {
					// 	while ($row = $result->fetch_assoc()) {
					// 		echo "<div class='border border-success p-4 mb-2'>
					// 			<h5>ID: " . $row["id"] . "</h5>
					// 			<p>Tên: " . $row["firstname"] . "</p>
					// 			<p>Họ: " . $row["lastname"] . "</p>
					// 			<p>Email: " . $row["email"] . "</p>
					// 			<div class='btn-group'>
					// 				<a href='?action=update&id=".$row["id"]."' class='btn btn-info'>Cập nhật</a>
					// 				<a href='?action=delete&id=".$row["id"]."' class='btn btn-danger'>Xóa</a>
					// 			</div>

					// 		</div>";
					// 	}
					// } else {
					// 	echo "0 results";
					// }

					?>
					<!-- pagonation - phân trang-->
					<?php
					$currentPage = 1;
					if (isset($_GET['pg'])) {
						$currentPage = $_GET['pg'];
					}
					$sql = "SELECT * FROM Student LIMIT 6 OFFSET " . (($currentPage - 1) * 6);

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div class='border border-success p-4 mb-2'>
									<h5>ID: " . $row["id"] . "</h5>
									<p>Tên: " . $row["firstname"] . "</p>
									<p>Họ: " . $row["lastname"] . "</p>
									<p>Email: " . $row["email"] . "</p>
									<div class='btn-group'>
										<a href='?action=update&id=" . $row["id"] . "' class='btn btn-info'>Cập nhật</a>
										<a href='?action=delete&id=" . $row["id"] . "' class='btn btn-danger'>Xóa</a>
									</div>
								</div>";
						}
					}
					?>
					<div class="container text-center">
						<li class="btn-group">
							<?php
							$sql = "SELECT COUNT(ID)
								FROM student";
							$result = $conn->query($sql);
							$res;
							if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								$res = $row['COUNT(ID)'];
							}
							$numberOfPage = floor($res / 6);
							if ($res % 6 > 0) $numberOfPage++;
							$currentPage = 1;
							if (isset($_GET['pg'])) {
								$currentPage = $_GET['pg'];
							}
							for ($i = 0; $i < $numberOfPage; $i++) {
								echo ('<a href="?pg=' . ($i + 1) . '" class="btn btn-' . ($currentPage == ($i + 1) ? 'info' : 'default') . '">' . ($i + 1) . '</a>');
							}
							?>
						</li>
					</div>
				</div>
				<div class="col-sm-6">

					<?php
					if (isset($_GET['action']) && $_GET['action'] == 'update') {
						$sql = "SELECT * FROM student WHERE id = " . $_GET['id'];
						$result = $conn->query($sql);
						$student;
						if ($result->num_rows > 0) {
							$student = $result->fetch_assoc();
						}
						echo '<h5 class="text-center">Form cập nhật</h5>
						<form class="p-4" action="" method="post">
							<div class="form-group">
								<label for="id">ID</label>
								<input class="form-control" type="text" name="id" id="id" value="' . $student['id'] . '" readonly>
							</div>
							<div class="form-group">
								<label for="firstname">Tên</label>
								<input class="form-control" type="text" name="firstname" id="firstname" value="' . $student['firstname'] . '">
							</div>
							<div class="form-group">
								<label for="lastname">Tên</label>
								<input class="form-control" type="text" name="lastname" id="lastname" value="' . $student['lastname'] . '">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" type="email" name="email" id="email" value="' . $student['email'] . '">
							</div>
							<button type="submit" class="btn btn-info btn-block">Cập nhật</button>
						</form>';
					}
					?>

				</div>

			</div>
		</div>
	</div>


</body>

</html>
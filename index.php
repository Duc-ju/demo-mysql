<!-- Ví dụ (Hướng đối tượng MySQLi) -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Tạo kết nối

// $conn = new mysqli($servername, $username, $password);

// if ($conn->connect_error) {
// 	die("Kết nối thất bại: " . $conn->connect_error);
// }
// echo "Tạo kết nối thành công";

// Tạo database mới
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
// 	echo "Tạo thành công";
// } else {
// 	echo "Tạo thất bại: " . $conn->error;
// }

//Kết nối tới db khi tạo xong
// if($conn->select_db($dbname)=== TRUE) {
// 	echo "Kết nối thành công";
// } else{
// 	echo "Kết nối thất bại". $conn->error;
// }



// Tạo kết nối
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
// 	die("Kết nối thất bại: " . $conn->connect_error);
// }

//Tạo bảng
// $sql = "CREATE TABLE Student (
// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// 	firstname VARCHAR(30) NOT NULL,
// 	lastname VARCHAR(30) NOT NULL,
// 	email VARCHAR(50)
// 	)";
// if($conn->query($sql)){
// 	echo "Tạo bảng thành công";
// }
// else{
// 	echo "Tạo bảng thất bại";
// }


//Thêm bản ghi mới và lấy index từ trường auto increment
// $sql = "INSERT INTO Student (firstname, lastname, email)
// VALUES ('Nguyễn', 'Hiếu', 'hieu73@gmail.com')";

// if ($conn->query($sql) === TRUE) {
// 	$last_id = $conn->insert_id;
// 	echo "Thêm mới thành công, ID của sinh viên vừa tạo là: " . $last_id;
// } else {
// 	echo "Lỗi: " . $sql . "<br>" . $conn->error;
// }

// prepared
// $stmt = $conn->prepare("INSERT INTO Student (firstname, lastname, email) VALUES (?, ?, ?)");
// $stmt->bind_param( "sss", $firstname, $lastname, $email);


// $firstname = "Nguyễn";
// $lastname = "Đức";
// $email = "trangduc56@gmail.com";
// $stmt->execute();

// $firstname = "Nguyen";
// $lastname = "Hieu";
// $email = "hieu123@gmail.com";
// $stmt->execute();

// $firstname = "John";
// $lastname = "Doe";
// $email = "john@gmail.com";
// $stmt->execute();

// $firstname = "Mary";
// $lastname = "Moe";
// $email = "mary@gmail.com";
// $stmt->execute();

// $firstname = "Julie";
// $lastname = "Dooley";
// $email = "julie@gmail.com";
// $stmt->execute();
// $conn->close();
?>


<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root"; // phpMyAdmin kullanıcı adı
$password = ""; // phpMyAdmin şifresi
$dbname = "user_database";

// Bağlantı oluştur
$conn = new mysqli("localhost", "root", "", "user_database", 3307);



// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Form gönderildiğinde işlem yap
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['RegistrationForm']['login'];
    $email = $_POST['RegistrationForm']['email'];
    $first_name = $_POST['RegistrationForm']['first_name'];
    $last_name = $_POST['RegistrationForm']['last_name'];
    $phone = $_POST['RegistrationForm']['skype'];
    $password = password_hash($_POST['RegistrationForm']['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, first_name, last_name, phone, password) 
            VALUES ('$username', '$email', '$first_name', '$last_name', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Kayıt başarılı!";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

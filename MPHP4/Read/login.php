<!-- Hier wordt het login-systeem verwerkt -->
<?php
require_once '../config.inc.php';
$username = $_POST['username'];
$password = $_POST['password'];
$response = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => '6LcQJuIZAAAAAB7N2V5W21x0oU_eko4Yojik8e4l',
    'response' => $_POST["g-recaptcha-response"]
);
$options = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success = json_decode($verify);

if (strlen($username) > 0 && strlen($password) > 0) {

    $password = md5($password);

    $query = "SELECT * FROM back2_users WHERE 
        username = '$username'
        AND password = '$password'";

    $resultaat = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($resultaat) == 1 && $captcha_success->success == true) {

        session_start();
        $_SESSION['username'] = $username;

        header("Location:home.php");
        echo "<p>You are not not a bot!</p>";
    } else if ($captcha_success->success == false) {
        // echo "<p>You are not not a bot!</p>";
    echo "<p>You are a bot! Go away!</p>";
    } else {

        echo "verkeerde info ingevuld <br/>";
        echo "<a href='../index.html'>Probeer het opnieuw</a>";
        // header("Location:../index.html");
        exit;
    }
} else {
    echo "niet alle velden zijn ingevuld!";
    exit;
}
?>
<?php
session_start();
include('config/conn.php');


// Google reCAPTCHA Secret Key
$secret_key = '6LdtXH4qAAAAAFv5nNM_asFuqZ6r3hu52AWC6rpa'; // Ganti dengan Secret Key Anda
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if (isset($_POST['cek_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $captcha_response = $_POST['g-recaptcha-response']; // Tangkap response CAPTCHA

    // Verifikasi CAPTCHA
    // $captcha_verify_url = "https://www.google.com/recaptcha/api/siteverify";
    // $response = file_get_contents($captcha_verify_url . "?secret=" . $secret_key . "&response=" . $captcha_response);
    // $response_keys = json_decode($response, true);

    if (empty($captcha_response) || !$response_keys['success']) {
        $error = 'Please verify that you are not a robot!';
    } else {
        if (empty($username) && empty($password)) {
            $error = 'Harap isi username dan password';
        } else {
            $user = mysqli_query($con, "SELECT * FROM users WHERE username='$username'") or die(mysqli_error($con));
            if (mysqli_num_rows($user) != 0) {
                $data = mysqli_fetch_array($user);
                if (password_verify($password, $data['password'])) {
                    $_SESSION['iduser'] = $data['id_users'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['fullname'] = $data['nama'];
                    $_SESSION['level'] = $data['level'];

                    // Redirect after successful login
                    $_SESSION['login_success'] = true;
                    header("Location: " . $base_url);
                } else {
                    $error = 'Password anda salah';
                }
            } else {
                $error = 'Username tidak terdaftar';
            }
        }
        $_SESSION['error'] = $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventaris RPTRA - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=$base_url;?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=$base_url;?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    
  <!-- <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdtXH4qAAAAAOshzSCMkXEn8tWI0J9NHekUXMUb"></script> -->
    <style>
        /* Background gradient */
        body {
            background: linear-gradient(145deg, #4facfe, #ffffff);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        /* Glassmorphism card */
        .card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 2.5s ease;
        }

        /* Text styling */
        .card h1 {
            color: #3b82f6;
            font-weight: 600;
            font-size: 26px;
            text-align: center;
        }

        .card p {
            color: #555;
            font-size: 14px;
            text-align: center;
            margin-top: -10px;
            font-weight: 300;
        }

        /* Form field styling */
        .form-control-user {
            background-color: rgba(255, 255, 255, 0.3);
            color: #333;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 15px;
            transition: box-shadow 1s ease;
        }
        .form-control-user:focus {
            box-shadow: 0 0 8px #4facfe;
        }

        /* Button styling */
        .btn-primary {
            background-color: #3b82f6;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            transition: 1s ease;
        }

        .btn-primary:hover {
            background-color: #3074e4;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
            transform: scale(1.05);
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Error message styling */
        .error-message {
            color: #ff4d4d;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Animation for fade-out effect */
        .fade-out {
            animation: fadeOut 1.5s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <div class="card" id="login-card">
        <h1>Selamat Datang</h1>
        <p>Inventaris RPTRA Cibubur Berseri</p>

        <!-- Error message display -->
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error-message"><?= $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <!-- Login form -->
        <form method="post" action="" onsubmit="handleLogin()">
            <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
            </div>

            <!-- Google reCAPTCHA Widget -->
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

            <button type="submit" class="btn btn-primary btn-block" name="cek_login">Login</button>
        </form>
    </div>

    <!-- Google reCAPTCHA Script -->
    <!-- <script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LdtXH4qAAAAAOshzSCMkXEn8tWI0J9NHekUXMUb', {action: 'LOGIN'});
    });
  }
</script> -->
    <!-- 
    <script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6LdtXH4qAAAAAOshzSCMkXEn8tWI0J9NHekUXMUb', {action: 'LOGIN'});
        });
    }
    </script> -->



    <!-- Bootstrap core JavaScript-->
    <script src="<?=$base_url;?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$base_url;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$base_url;?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- <script>
        function handleLogin() {
            // Apply fade-out animation before redirection
            const loginCard = document.getElementById('login-card');
            loginCard.classList.add('fade-out');
            setTimeout(() => {
                // Once fade-out is complete, redirect the user
                window.location.href = '<?=$base_url;?>'; // Adjust the URL to your landing page
            }, 1500); // Match the timeout with animation duration
        }
    </script> -->
    <!-- <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
            const token = await grecaptcha.enterprise.execute('6LdtXH4qAAAAAOshzSCMkXEn8tWI0J9NHekUXMUb', {action: 'LOGIN'});
            });
        }
    </script> -->
</body>


</html>

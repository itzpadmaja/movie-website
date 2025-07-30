<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MovieStars</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #1c1c1c;
        }

        .container {
            display: flex;
            background: #fff;
            width: 800px;
            height: 500px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(155, 39, 97, 0.3);
            overflow: hidden;
        }

        .sidebar {
            background: pink;
            width: 35%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .login-form {
            width: 65%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: pink;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background-color:rgb(209, 40, 110);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="sidebar">MovieStars</div>
        <div class="login-form">
            <h2>Login</h2>
            <form id="loginForm">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            if (email === "padmaja@gmail.com" && password === "padma123") {
                window.location.href = "admin.php";
            } else {
                alert("Login Successful!");
                window.location.href = "movie.php";
            }
        });
    </script>

</body>
</html>

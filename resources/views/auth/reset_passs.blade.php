<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #4CAF50; /* Couleur de fond verte */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            color: #fff;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #333;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #E91E63; /* Couleur du bouton */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .btn:hover {
            background-color: #c2185b;
        }
    </style>
</head>
<body>

    <form class="container" action="{{ url('set_new_password/'.$token) }}" method="post" >
        {{ csrf_field() }}
        <h2>Reset Password</h2>
        <div class="form-group">
            <label for="new-password">Enter New Password</label>
            <input type="password"  name="password" placeholder="Enter New Password">
            <span style="color: red; font-size:15px;">{{ $errors->first('password') }}</span>
        </div>
        <div class="form-group">
            <label for="confirm-password">Enter Confirm Password</label>
            <input type="password" name="confirm_password"  placeholder="Enter Confirm Password">
            <span style="color: red; font-size:15px;">{{ $errors->first('confirm_password') }}</span>
        </div>
        <button type="submit" class="btn">Reset Password</button>
    </form>

</body>
</html>

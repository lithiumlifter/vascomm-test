<!DOCTYPE html>
<html>
<head>
    <title>Your New Account</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Your account has been created successfully. Here are your details:</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
</body>
</html>

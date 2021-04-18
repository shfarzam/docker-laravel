<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>Dashboard</h4><hr>
            <table class="table table-hover">
                <thead>
                <th>Name</th>
                <th>Email</th>
                <th></th>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $UserInfo['first_name'].' '.$UserInfo['last_name'] }}</td>
                    <td>{{ $UserInfo['email'] }}</td>
                    <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                </tr>
                </tbody>
            </table>

            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/profile">Profile</a></li>
                <li><a href="/admin/settings">Settings</a></li>
                <li><a href="/admin/staff">Staff</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Login admin/user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card col-md-4 mx-auto shadow">
        <div class="card-header bg-primary text-white">
            <h4>Login</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('authenticate') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>

                <button class="btn btn-primary w-100">
                    Login
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>
```

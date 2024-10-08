<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="image-prefix">
                        @if(!empty($avatar))
                        <img src="{{ $avatar }}" alt="" width="200px" height="200px">
                        @endif
                    </div>
                    <input name="avatar" type="file" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>

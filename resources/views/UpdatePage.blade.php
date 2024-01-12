<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bootstrap Form</title>
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-primary" role="alert">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <strong>
                        {{ $error }}
                    </strong>
                @endforeach
            @endif
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}/create">Add</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <a href="{{ url('/') }}/read"><button class="btn btn-outline-success" type="submit">Show
                                Details</button></a>
                    </form>
                </div>
            </div>
        </nav>
        <form action="{{ url('/updateAtPosition') }}/{{ $allEmployee->id }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name"class="form-control" id="name" placeholder="Enter your name"
                    value={{ $allEmployee->name }}>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"
                    value={{ $allEmployee->email }}>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your address">{{ $allEmployee->address }}</textarea>
            </div>


            <div class="form-group">
                <label for="salary">Salary:</label>
                <input name="salary"type="text" class="form-control" id="state" placeholder="Enter your salary"
                    value={{ $allEmployee->salary }}>
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <select name="country"class="form-control" id="country" value={{ $allEmployee->country }}>
                    <option value="usa">United States</option>
                    <option value="canada">Canada</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="date"class="form-control" id="dob">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

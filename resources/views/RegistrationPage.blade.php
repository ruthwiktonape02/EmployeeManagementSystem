<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Bootstrap Form</title>

</head>

<body>

    <span class="text-danger">
        @error('sucess')
            {{ $message }}
        @enderror
    </span>
    <div class="alert alert-primary" role="alert">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <strong>
                    {{ $error }}
                </strong>
            @endforeach
        @endif
    </div>

    <h1 class="text-center">Employee Registration Page</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/logout">Logout</a>
                    </li>
                </ul>
                {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                <a href="{{ url('/read') }}"><button class="btn btn-outline-success" type="submit">Show
                        Details</button></a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <form id="form" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name"class="form-control" id="name" placeholder="Enter your name">
                <span>
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                <span>
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
                <span>
                    @error('address')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <label for="salary">Salary:</label>
                <input name="salary"type="text" class="form-control" id="state" placeholder="Enter your salary">
                <span>
                    @error('salary')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <select name="country"class="form-control" id="country">
                    <option value="usa">United States</option>
                    <option value="canada">Canada</option>
                    <!-- Add more options as needed -->
                    <span>
                        @error('country')
                            {{ $message }}
                        @enderror
                    </span>
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="date"class="form-control" id="dob">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <span>
                @error('date')
                    {{ $message }}
                @enderror
            </span>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <!--  this is modal-->


    {{-- <div id="ModalLoginForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Login</h1>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <form action="{{ url('/') }}/create" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name"class="form-control" id="name"
                                    placeholder="Enter your name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter your email">
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input name="salary"type="text" class="form-control" id="state"
                                    placeholder="Enter your salary">
                            </div>

                            <div class="form-group">
                                <label for="country">Country:</label>
                                <select name="country"class="form-control" id="country">
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
                    </div> --}}
    <script>
        $(document).ready(function() {
            $("#form").on('submit', function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/create') }}",
                    data: formData,
                }).done(function(data) {
                    console.log(data);

                });



            });
        });
    </script>
</body>

</html>

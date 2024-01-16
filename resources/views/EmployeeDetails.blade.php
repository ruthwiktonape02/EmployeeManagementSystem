<!doctype html>
<html lang="en">

<head>
    <title>Employee Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

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
                        <a class="nav-link" href="{{ url('/') }}/employeeRegister">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/logout">Logout</a>
                    </li>
                </ul>
                <form class="d-flex">
                    {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                    <a href="{{ url('/') }}/read"><button class="btn btn-outline-success" type="submit">Show
                            Details</button></a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th>salary</th>
                    <th>adress</th>
                    <th>date of birth</th>
                    <th>CRUD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allEmployee as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>
                            {{ $employee->address }}
                        </td>
                        <td>{{ $employee->date }}</td>
                        <td><button data-toggle="modal" data-target="#ModalDelete-{{ $employee->id }}"
                                class="btn btn-primary" class="btn btn-danger">delete</button></td>
                        <td><button data-toggle="modal" data-target="#ModalUpdateForm-{{ $employee->id }}"
                                class="btn btn-primary">update</button></td>
                    </tr>

            </tbody>


            {{--
**
*
*
this is modal for delete
*
*
*
**              --}}


            <div id="ModalDelete-{{ $employee->id }}" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form method="POST">
                        <input type="hidden" name="id">
                    </form>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Conformation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure you Wanna Delete Current Record!!</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/delete') }}/{{ $employee->id }}"><button type="button"
                                    class="btn btn-primary">confirm</button></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <!--
        
        Modal HTML Markup for update
    
    -->

    <div id="ModalUpdateForm-{{ $employee->id }}" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Update</h1>
                </div>
                <div class="modal-body">
                    <form id="update-{{ $employee->id }}" {{-- action="{{ url('/updateAtPosition') }}" --}} method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name"class="form-control" id="name"
                                placeholder="Enter your name" value={{ $employee->name }}>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email" value={{ $employee->email }}>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your address"> {{ $employee->address }} </textarea>
                        </div>


                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input name="salary"type="text" class="form-control" id="state"
                                placeholder="Enter your salary" value={{ $employee->salary }}>
                        </div>

                        <div class="form-group">
                            <label for="country">Country:</label>
                            <select name="country"class="form-control" id="country" value={{ $employee->country }}>
                                <option value="usa">United States</option>
                                <option value="canada">Canada</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" name="date"class="form-control" id="dob"
                                value="{{ $employee->date }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
<script>
    < script >
        $(document).ready(function() {
            $("#form").on('submit', function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/') }}/read",
                    data: formData,
                }).done(function(data) {
                    console.log(data);

                });



            });
        });
</script>

</html>

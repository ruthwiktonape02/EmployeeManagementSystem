<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <h1 class="text-center">Super User Login</h1>
    <form id="form" method="POST">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>
        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>

        {{-- <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
        </div> --}}
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>


</body>
<script>
    < script >
        $(document).ready(function() {
            $("#form").on('submit', function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/') }}/superUserLogin",
                    data: formData,
                }).done(function(data) {
                    console.log(data);

                });



            });
        });
</script>
{{-- // $(document).ready(function() {

// $("#form").on('submit', function(event) {
// event.preventDefault();
// var formData = $(this).serialize();
// $.ajax({
// type: "POST",
// url: "{{ url('/') }}/superUserLogin",
// data: formData,
// }).done(function(data) {
// console.log(data);
// });


// });
// });
// $(function() {
// $("#form").on("submit", function(event) {
// event.preventDefault();

// var formData = $(this).serialize();
// $.ajax({
// url: "{{ url('/superUserLogin') }}",
// type: "post",
// data: formData,
// success: function(d) {
// alert(d);
// }
// });
// });
// })//
</script> --}}

</html>

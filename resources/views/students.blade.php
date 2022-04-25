@extends('layouts.app')

@section('content')
<html>
<head>

    <title>Ajax CRUD</title>


</head>
<body>
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Students <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#studentModal">Add New</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->firstname}}</td>
                                            <td>{{$student->lastname}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->phone}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="studentForm">
                        @csrf
                        <div class="form-check">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname">
                        </div>
                        <div class="form-check">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname">
                        </div>
                        <div class="form-check">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-check">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function () {
            //alert  ("Geht");
            $("#studentForm").submit(function (e){
                e.preventDefault();

                let firstname = $('#firstname').val();
                let lastname = $('#lastname').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let _token = $("input[name=_token]").val();

                $.ajax({
                    type: "POST",
                    url: "{{route('student.add')}}",
                    dataType: 'json',
                    data: {
                        firstname:firstname,
                        lastname:lastname,
                        email:email,
                        phone:phone,
                        _token:_token
                    },
                    success: function (response) {
                        if (response){
                            $("#studentTable tbody").prepend('<tr><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td>' +
                                '<td>'+response.phone+'</td></tr>');
                            $("#studentForm")[0].reset();
                            $("#studentModal").modal('hidden');
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            });
        });

    </script>
</body>
</html>
@endsection

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
                                    <th>Name</th>
                                    <th>Created_at</th>
                                    <th>Body</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->body}}</td>

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
                            <label for="body2">Body</label>
                            <input type="text" class="form-control" id="body2">
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

                let body2 = $('#body2').val();
                let usrname = {{auth()->user()->id}};
                let created_at;
                let name;
                //$('#firstname').val()
                let _token = $("input[name=_token]").val();

                $.ajax({
                    type: "POST",
                    url: "{{route('ajax.add')}}",
                    dataType: 'json',
                    data: {
                        usrname: usrname,
                        body2:body2,
                        name:name,
                        created_at:created_at,
                        _token:_token
                    },
                    success: function (response) {
                        if (response){
                            $("#studentTable tbody").prepend('<tr><td>'+response.user_id+'</td><td>'+response.created_at+'</td><td>'+response.body+'</td></tr>');
                            $("#studentForm")[0].reset();
                            //$("#studentModal").modal('hidden');
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

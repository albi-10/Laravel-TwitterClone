@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="pt-4">
                <div class="col-md-10 col-md-offset-1">
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ $user->name }}'s Profile</h2>
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar" onchange="loadFile(event)">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                        <img id="output" src="#" alt="" />
                    </form>
                </div>
            </div>

        </div>
    </div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection

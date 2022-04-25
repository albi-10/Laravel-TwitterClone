@extends('layouts.app')
@section('content')
    <div class="col-4 ps-4 pe-4 rounded-3 shadow">
        <form id="PostForm">
            @csrf
            <div class="md-form mb-4 pink-textarea active-pink-textarea pt-4">
                <label for="body" class="visually-hidden">Kommentar verfassen</label>
                <textarea name="body" id="body" cols="20" rows="4" class=" md-textarea  form-control  @error('body') border-red-500 @enderror" placeholder="Schreibe etwas!" ></textarea>

                @error('body')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>

        <div class="col-md-12 pt-4 pb-4">
            @if($posts->count())
                @foreach($posts as $post)
                    <a href="{{route('profile.show',$post->user->name)}}" class="font-monospace fw-bold " style="text-decoration: none">{{$post->user->name}}</a>
                    <span class="text-black-50 text-sm-center">{{$post->created_at}}</span>
                    <p class="mb-2">{{$post->body}}</p>
                @endforeach
            @else
                <p>Hier ist nichts</p>
            @endif
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
                            $("#studentTable").prepend('<tr><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td>' +
                                '<td>'+response.phone+'</td></tr>');
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
@endsection

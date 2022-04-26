
@extends('layouts.app')

@section('content')
    @if(auth()->user()->id==$user->id)
        <body class= "bg-lila">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="/uploads/avatars/{{$user->avatar}}" class="rounded-circle mt-5" style="width: 250px; height: 250px;  ">
                        <span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span>

                            <div class="card mt-2 col-md-12" >
                                <a class="btn btn-primary btn-sm" href="/profile"> Profilbild ändern</a>
                            </div>


                        <textarea class="md-textarea  form-control mt-4 col-md-12" rows="6" cols="50" style="resize: none" placeholder="Hier steht ihre Profilbeschreibung"></textarea>
                    </div>

                </div>

                <div class="col-md-5 border-end-l border-start-l">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Vorname</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                            <div class="col-md-6"><label class="labels">Nachname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-md-12"><label class="labels">Mobile Telefonnummer</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                            <div class="col-md-6"><label class="labels">Addresse </label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                            <div class="col-md-6"><label class="labels">Postleitzahl</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Stadt</label><input type="text" class="form-control" placeholder="country" value=""></div>
                            <div class="col-md-6"><label class="labels">Land</label><input type="text" class="form-control" value="" placeholder="state"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>
            </div>
        </div>
        </body>

    @else <!-- Wenn man nicht der User ist der in der Route steht -->
    <body class= "bg-lila">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="/uploads/avatars/{{$user->avatar}}" class="rounded-circle mt-5" style="width: 250px; height: 250px;  ">
                    <span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span>
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        <div class="card mt-2 col-md-12" >
                            <label>Update Profilbild</label>
                            <input type="file" name="avatar">
                            <input type="hidden" namen="token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn-primary btn btn-sm">
                        </div>

                    </form>
                    <textarea class="md-textarea  form-control mt-4 col-md-12" rows="6" cols="50" style="resize: none" placeholder="Hier steht ihre Profilbeschreibung"></textarea>
                </div>

            </div>

            <div class="col-md-5 border-end-l border-start-l">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Vorname</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                        <div class="col-md-6"><label class="labels">Nachname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3 ">
                        <div class="col-md-12"><label class="labels">Mobile Telefonnummer</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                        <div class="col-md-6"><label class="labels">Addresse </label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                        <div class="col-md-6"><label class="labels">Postleitzahl</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Stadt</label><input type="text" class="form-control" placeholder="country" value=""></div>
                        <div class="col-md-6"><label class="labels">Land</label><input type="text" class="form-control" value="" placeholder="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </body>

    @endif
@endsection

{{--
<body class= "bg-lila">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="250px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold">@ {{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span>
                        <textarea class="md-textarea  form-control" rows="6" cols="50" style="resize: none" placeholder="Hier steht ihre Profilbeschreibung">

                    </textarea>
                    </div>

                </div>

                <div class="col-md-5 border-end-l border-start-l">
                    <div class="flex justify-center">
                        <div class="w-8/12 bg-white p-6 rounded-lg">

                            @foreach($posts as $post)
                                @include('components.post')

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
--}}

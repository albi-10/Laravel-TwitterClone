
@extends('layouts.app')

@section('content')
<body class= "bg-lila">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="250px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span>
                    <textarea class="md-textarea  form-control" rows="6" cols="50" style="resize: none" placeholder="Hier steht ihre Profilbeschreibung">

                    </textarea>
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
@endsection

{{--
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $profile->name}}</div>

                        <follow-button user-id="{{ Auth::user()->id }}" follows=""></follow-button>
                    </div>
                </div>
                <div class="d-flex">

                    <div class="pr-5"><strong></strong> followers</div>
                    <div class="pr-5"><strong></strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold"></div>
                <div></div>
                <div><a href="#"></a></div>
            </div>
        </div>
    </div>
--}}

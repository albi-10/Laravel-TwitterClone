
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ Auth::user()->name }}</div>

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
@endsection

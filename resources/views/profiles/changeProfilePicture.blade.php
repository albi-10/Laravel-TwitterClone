@extends('layouts.app')
@section('content')
<div class="container rounded">
    <div class="row">
        <div class="col-md-5 border-end-l border-start-l">
            <h3>Profile Image upload form</h3>
            <userprofile-component></userprofile-component>
            {{--
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="d-block">
                    <input
                        type="file"
                        class="d-block shadow mb-5 p-2 w-75 fst-italic placeholder-glow"
                        name="image"
                    >
                </div>
                <button class="btn btn-primary">Upload Picture</button>
            </form>
            --}}
        </div>
    </div>
</div>

@endsection

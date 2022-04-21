@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="container pt-4">
        <div class="row">
            <div class="col-3">
                <img src="https://www.mui-lamandau.or.id/wp-content/uploads/2021/08/avatar-488x570.jpg" class="rounded-circle shadow" style="width: 200px; height: 200px"> <!-- Profilbild -->
                <h1 class="">User: {{ Auth::user()->name }}</h1>
                <!-- <div class="align-middle"><h1 class="text-lg-center pe-lg-5 "> </h1></div>  -->
            </div>
            <div class="col-4 ps-4 pe-4 rounded-3 shadow" style="background-color: #c5c5c7;" >
                <!-- Post-->
                <form action="{{route('post')}}" method="post">
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
                    <div class="card">
                        <div class="card-body">
                            @if($posts->count())
                                @foreach($posts as $post)

                                    <div class="mb-4">
                                        <a href="{{route('profile.show',$post->user->name)}}" class="font-monospace fw-bold " style="text-decoration: none">{{$post->user->name}}</a> <span class="text-black-50
                                        text-sm-center">{{$post->created_at}}</span>
                                        <p class="mb-2">{{$post->body}}</p>

                                        <div class="row">

                                            <!--Hier-->
                                        @if(!$post->dislikedBy(auth()->user())) <!-- Wenn der User kein DisLike hat soll ein Like hinzugefügt werden-->
                                        @if(!$post->likedBy(auth()->user()))<!-- Wenn der User kein Like hat soll ein Like hinzugefügt werden-->
                                            <div class="col-sm-2">
                                                <form action="{{route('post.likes',$post->id)}}" method="post" >
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary shadow-none" style="color: white;">
                                                        <span>{{$post->likes->count()}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- ^^ Like wird hinzugefügt, weil keine DisLikes(wenn Dislike -> Löschen) und Keine likes ^^ -->
                                            @else
                                                <div class="col-sm-2">
                                                    <form action="{{route('post.likes',$post->id)}}" method="post" >
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary shadow-none" style="color: white; ; pointer-events: none;" resetBtn.disabled = "disabled";>
                                                            <span>{{$post->likes->count()}}</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                                                <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif

                                            @else<!--Wenn gedislikt ist dann soll man seinen disLike löschen können-->
                                            <div class="col-sm-2">
                                                <form action="{{route('post.dislikes',$post->id)}}" method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary shadow-none" style="color: white; " resetBtn.disabled = "disabled";>
                                                        <span>{{$post->likes->count()}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                                            <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif

                                        <!--Hiier-->

                                            <!--Versuch-->
                                            @if(!$post->likedBy(auth()->user())) <!-- Wenn der User kein Like hat soll ein Dislike hinzugefügt werden-->
                                            @if(!$post->dislikedBy(auth()->user()))<!-- Wenn der User kein Dislike hat soll ein Dislike hinzugefügt werden-->
                                            <div class="col-sm-2">
                                                <form action="{{route('post.dislikes',$post->id)}}" method="post" >
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary shadow-none" style="color: white; background: #c71111; border-color: #c71111; ">
                                                        <span>{{$post->dislikes->count()}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                                            <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- Dislike wird hinzugefügt, weil keine Likes(wenn Like -> Löschen) und Keine Disklikes -->
                                            @else
                                                <div class="col-sm-2">
                                                    <form action="{{route('post.dislikes',$post->id)}}" method="post" >
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary shadow-none" style="color: white; background: #c71111; border-color: #c71111;pointer-events: none;" resetBtn.disabled = "disabled";>
                                                            <span>{{$post->dislikes->count()}}</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                                                <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif

                                            @else<!--Wenn gelikt ist dann soll man seinen Like löschen können-->
                                            <div class="col-sm-2">
                                                <form action="{{route('post.likes',$post->id)}}" method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary shadow-none" style="color: white; background: #c71111; border-color: #c71111" resetBtn.disabled = "disabled";>
                                                        <span>{{$post->dislikes->count()}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                                            <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                        <!--Dislike ende-->

                                            @if($post->ownedBy(auth()->user()))
                                                <div class="col-sm-2 ">
                                                    <form action="{{route('post.destroy',$post)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>Delete</button>
                                                    </form>
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                @endforeach
                                <div class="float-start pt-3">
                                    @if($posts->lastPage()==0)

                                    @else
                                        <p style="color: #20c997" >Seite {{$posts->currentPage()}} von {{$posts->lastPage()}}</p>
                                    @endif

                                </div>

                                <div class="float-end" >
                                    {{$posts->links()  }}

                                </div>
                            @else
                                <p>Mommentan gibt es keine Kommentare. Sei der erste und Kommentiere!</p>
                            @endif
                        </div>

                    </div>
                </div>

                <!-- Post end -->
            </div>
        </div>
    </div>
@endsection

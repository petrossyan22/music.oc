@extends('layouts.app')
@section('content')
    <div id="player_container">
        <video src="/video_uploads/{{$video['video']}}"
            poster="/poster_uploads/{{$video['poster']}}" 
            id="video"
            data-id="{{$video['id']}}" controls autoplay>
        </video>
        @foreach ($video->user as $user)
            {{$user["name"]}} -
        @endforeach 
        __ {{$video["title"]}}
        <br>
        <span id="is_from_playlist"></span>
        <span id="like_form">

        </span>

        <span id="likes"></span>
    </div>
    <div id="recomendation">
        @foreach($videos as $v)
            <div class="recomendation_link" data-id="{{$v['id']}}" data-src="{{$v['video']}}"data-poster="{{$v['poster']}}">
                <img src="/poster_uploads/{{$v['poster']}}">
                <a href="/watch/{{$v['id']}}">
                    @foreach ($v->user as $user)
                        {{$user["name"]}} -
                    @endforeach  __ {{$v['title']}}
                </a>
            </div>
        @endForeach
    </div>
@endsection
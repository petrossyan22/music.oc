@extends('layouts.app')
@section('content')
    <div id="player_container">
        <video src="/video_uploads/{{$video['video']}}"
            poster="/poster_uploads/{{$video['poster']}}" 
            id="video"
            data-id="{{$video['id']}}" autoplay controls >
        </video>
        <!-- <div class="control_panel">
            <i class="fa fa-play text_success" id="play"></i>
            <i class="fa fa-expand text_success" id="play"></i>
        </div> -->

        @foreach ($video->user as $user)
            {{$user["name"]}} -
        @endforeach 
        __ {{$video["title"]}}
        <br>
        @if (Auth::check()) 
            <span id="is_from_playlist"></span>
            <span id="like_form">

            </span>

            <span id="likes"></span>
        @endif
    </div>
    <div id="recomendation">
        @foreach($videos as $v)
            <div class="recomendation_link" data-id="{{$v['id']}}" data-src="{{$v['video']}}"data-poster="{{$v['poster']}}">
                <img src="/poster_uploads/{{$v['poster']}}">
                <div>
                    <a href="/watch/{{$v['id']}}" class="link">
                    @foreach ($v->user as $user)
                        {{$user["name"]}} -
                    @endforeach  __ {{$v['title']}}
                </a>
                @foreach ($v->user as $user)
                    <a href="/account/{{$user['id']}}">
                        {{$user["email"]}}
                    </a>
                @endforeach
                </div>
            </div>
        @endForeach
    </div>
@endsection
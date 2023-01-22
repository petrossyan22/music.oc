@extends('layouts.app')
@section('content')
    <div id="player_container">
        <video src="/video_uploads/{{$video['video']}}"
            poster="/poster_uploads/{{$video['poster']}}" 
            id="video"
            data-id="{{$video['id']}}" controls >
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
            <span id="like_form">

            </span>

            <sub id="likes"></sub>  &nbsp;
            <span id="is_from_playlist" class="text_primary text_bold"></span>

        @endif
    </div>
    <div id="recomendation">
        @foreach($videos as $v)
            <div class="recomendation_link" data-id="{{$v['id']}}" data-src="{{$v['video']}}"data-poster="{{$v['poster']}}">
                <img src="/poster_uploads/{{$v['poster']}}">
                <div>
                    <a href="/watch/{{$v['id']}}" class="link text_primary pb_2">
                    @foreach ($v->user as $user)
                        {{$user["name"]}} -
                    @endforeach  __ {{$v['title']}}
                    <!-- <hr class="border_bottom_danger_1"> -->
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
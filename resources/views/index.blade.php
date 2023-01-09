@extends("layouts.app")

@section("content")
    <h5 class="video_links_title">What's New</h5>
    <hr class="video_links_divider">
    <div class="video_links">
        @foreach ($videos as $video)

            <div class="video_link">
                <img src="/poster_uploads/{{$video["poster"]}}">
                <a href="/watch/{{$video["id"]}}">
                    @foreach ($video->user as $user)
                        {{$user["name"]}} -
                    @endforeach 
                    __ {{$video["title"]}}
                </a>
            </div>
            
        @endforeach
    </div>
@endsection
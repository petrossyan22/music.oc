@extends("layouts.app")

@section("content")
    <h5 class="video_links_title">What's New</h5>
    <hr class="border_darker_1">
    <div class="video_links">
        @foreach ($videos as $video)

            <div class="video_link">
                <img src="/poster_uploads/{{$video["poster"]}}">
                <a href="/watch/{{$video['id']}}" class="text_secondary">
                    @foreach ($video->user as $user)
                        {{$user["name"]}} -
                    @endforeach 
                    __ {{$video["title"]}}
                </a>
                @foreach ($video->user as $user)
                    <a href="/account/{{$user['id']}}"class="text_primary font_size_sm">
                        {{$user["email"]}}
                    </a>
                @endforeach
            </div>
            
        @endforeach
    </div>
@endsection
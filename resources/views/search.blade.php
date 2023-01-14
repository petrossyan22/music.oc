@extends('layouts.app')

@section('content')
	<h1 class="text_success">Search Result</h1>
	@foreach($videos as $video)
		<p>
			<a href="/watch/{{$video->video_id}}" class="text_info">{{$video->title}}</a>
		</p>
		<hr class="border_danger_1">
	@endforeach	
@endsection
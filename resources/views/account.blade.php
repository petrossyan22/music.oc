@extends('layouts.app')

@section('content')
	<p class="text_danger text_bold">Account</p>
	<p class="text_light">
		Hello!!!, my name is` &nbsp;
		<span class="text_success text_bold">
			{{$user->name}}
		</span>
	</p>
	<p class="text_light">
		my email is` &nbsp;
		<span class="text_info">
		 	{{$user->email}}
		</span>
	</p>
	<p class="text_light">
		This is my songs list` &nbsp;
		<span class="text_info">
		 	@foreach($user->video as $v)
		 		<p class="pl_5">
		 			<a class="text_info" href="/watch/{{$v['id']}}">
		 				<i class="fa fa-play text_success"></i>
		 				{{$v["title"]}}
		 			</a>
		 		</p>
		 	@endforeach
		</span>
	</p>
@endsection
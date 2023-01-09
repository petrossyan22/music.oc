@extends("layouts.admin")

@section("content")
    <h1 class="walcome_text">
        Videos Table   
        <a class="create_button" href="/admin/videos/create">Create Video</a>       
    </h1>
    <table>
        <tr>
            <th>id</th>
            <th>video</th>
            <th>poster</th>
            <th>Title</th>
            <th>Singer</th>
            <th>tools</th>
        </tr>
        @foreach ($videos as $video)
            <tr>
                
                <td>{{$video["id"]}}</td>
                <td>{{$video["video"]}}</td>
                <td>{{$video["poster"]}}</td>
                <td>{{$video["title"]}}</td>
                
                <td>
                    @foreach ($video->user as $k => $user)
                        {{$user["name"]}} ,
                    @endforeach
                </td>
                <td>
                    <button class="quick_view">
                        <a href="/admin/users/{{$video["id"]}}">View</a>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
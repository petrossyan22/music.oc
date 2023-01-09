@extends("layouts.admin")

@section("content")
    <h1 class="walcome_text">
        Create Video
        <a class="back_button" href="/admin/videos">Go Back</a>       
    </h1>
    <form action="/admin/videos" method="POST" enctype="multipart/form-data">
        @method("POST")
        @csrf
        <input type="file" name="poster" id="" placeholder="Poster"><br><hr>
        <input type="file" name="video" id="" placeholder="Video"><br><hr>
        <input type="text" name="title" placeholder="Song Title"><br><hr>
        <input type="text" name="singer_id" placeholder="Song Singer Id">
        <button>Add Singer Field</button><br><hr>
        <button type="submit" class="go">Go</button>
    </form>
@endsection
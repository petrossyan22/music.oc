@extends('layouts.app')

@section('content')
<div class="container home_container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        @if(Auth::user()->avatar)
                            <style>
                                .avatar{
                                    background-image: url("{{Auth::user()->avatar}}");
                                    background-size: cover;
                                    background-position: center;
                                }
                            </style>
                        @endif
                    </div>
                    {{ __('Dashboard') }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -- as -- {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div><br><hr>
    <h3 class="text_success">Messanger</h3>
    <audio src="/message_sound.mp3" id="message_sound"></audio>
    <form action="/home" method="POST">
        @csrf
        @method("POST")
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select><br><br>
        <textarea cols="50" rows="5" type="text" name="message">message text</textarea><br><br>
        <!-- <input type="text" name="user_id" placeholder="Receiver ID"><br> -->
        <input type="text" name="sender_id" value="{{Auth::user()->id}}" hidden><br>
        <button type="submit"class="text_success text_bold bg_dark p_1_5">Submit</button>
    </form>
    <div id="messages" class="text_success p_1_5 border_danger_1 mt_5">
        new messages
    </div>
</div>
@endsection


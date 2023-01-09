@extends("layouts.admin")

@section("content")
    <h1 class="walcome_text">
        Users Table   
        <a class="create_button" href="/admin/users/create">Create User</a>       
    </h1>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>role</th>
            <th>tools</th>
        </tr>
        @foreach ($users as $user)

            <tr>
                <td>{{$user["id"]}}</td>
                <td>{{$user["name"]}}</td>
                <td>{{$user["email"]}}</td>
                <td>{{$user["password"]}}</td>
                <td>{{$user["role"]}}</td>
                <td>
                    <button class="quick_view">
                        <a href="/admin/users/{{$user["id"]}}">View</a>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
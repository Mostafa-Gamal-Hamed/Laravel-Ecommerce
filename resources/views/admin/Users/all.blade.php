@extends("admin.layout")

@section("body")
{{-- Users --}}
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">
    <h2 class="card-title text-center mb-5">{{__("words.Users Table")}}</h2>
    <div class="row mb-3">
        <h3 class="col text-start">{{__("words.Admin")}}: {{$adminCount}}</h3>
        <h3 class="col text-end me-3">{{__("words.Users")}}: {{$userCount}}</h3>
    </div>
    @include("errors")
    @include("success")
    <div class="table-responsive">
        @if ($users->isEmpty())
            <div class="alert alert-danger text-center">{{__("words.There Are No Users")}}</div>
        @else
            <table class="table text-center">
                <thead class="{{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}">
                <tr>
                    <th>{{__("words.Num")}}</th>
                    <th>{{__("words.Name")}}</th>
                    <th>{{__("words.Email")}}</th>
                    <th>{{__("words.Verified")}}</th>
                    <th>{{__("words.Statues")}}</th>
                    <th>{{__("words.Joined")}}</th>
                    <th>{{__("words.Change To")}}</th>
                    <th>{{__("words.Action")}}</th>
                </tr>
                </thead>
                <tbody class="{{$color == "light" ? "text-dark" : "text-light"}}">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->email_verified_at}}</td>
                            @if ($user->role == 1)
                                <td class="text-warning">{{__("words.Admin")}}</td>
                            @else
                                <td class="text-success">{{__("words.User")}}</td>
                            @endif
                            <td>{{$user->created_at}}</td>
                            @if ($user->role == 0)
                                <td><a href="{{url("makeAdmin/$user->id")}}" class="btn btn-warning">{{__("words.Admin")}}</a></td>
                            @else
                                <td><a href="{{url("makeUser/$user->id")}}" class="btn btn-success">{{__("words.User")}}</a></td>
                            @endif
                            <td>
                                <form action="{{url("deleteUser/$user->id")}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">{{__("words.Delete")}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection

<x-admin-master>

@section('content')

<h1>Users profile for: {{$user->name}}</h1>

<div class="row">
    <div class="col-sm-6">
    <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
            <a href="{{asset($user->profile_pic)}}" target="_blank"><img class="img-profile rounded-circle" height="150" src="{{$user->profile_pic}}"></a>
            </div>
            <br>

            <div class="input-group">
                <label class="custom-file-label" for="profile-pic">Change Profile Picture</label>
            <input type="file" class="custom-file" id="profile-pic" name="profile-pic">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
            @error('username')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
</div>


@endsection



</x-admin-master>
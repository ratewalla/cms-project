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

<div>
<h1>Role(s)</h1>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Has Role</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Has Role</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                </tr>
              </tfoot>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>
                            <input type="checkbox"
                            @foreach($user->roles as $user_role)
                                @if($user_role->slug == $role->slug)
                                    checked disabled
                                    @else unchecked disabled
                                @endif
                            @endforeach
                            >

                        </td>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->slug}}</td>
                        <td>
                        <form action="{{route('users.role.attach',$user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="role" value="{{$role->id}}">
                                <button class="btn btn-primary" 
                                @if($user->roles->contains($role))
                                    disabled
                                @endif
                            >Attach</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('users.role.detach',$user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="role" value="{{$role->id}}">
                                <button class="btn btn-danger" 
                                @if(!$user->roles->contains($role))
                                    disabled
                                @endif
                            >Detach</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
          </div>
    </div>
</div>



</div>


@endsection



</x-admin-master>
<x-admin-master>


    @section('content')
    @if(Session::has('deleted_message'))
    <div class="alert alert-danger">{{Session::get('deleted_message')}}</div>
    @endif

    <h1>Users</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Profile Picture</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Profile Picture</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
              </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->profile_pic}}" alt=""></td>
                    <td><a href="{{route('user.profile.show',$user->id)}}">{{$user->username}}</a></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td>
                        <form method="POST" action="{{route('user.destroy', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE') 
                            {{-- method field is needed for form to submit --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
          </div>
        </div>
        
      </div>
    <div class="d-flex">
        <div class="mx-auto">
      {{$users->links()}}
    </div>
    </div>


    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('js/datatables-demo.js')}}"></script>
    @endsection


</x-admin-master>
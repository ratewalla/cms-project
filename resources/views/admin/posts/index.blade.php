<x-admin-master>

    @section('content')

    @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @elseif(Session::has('successMessage'))
        <div class="alert alert-success">{{Session::get('successMessage')}}</div>
        @elseif(Session::has('updatedMessage'))
        <div class="alert alert-success">{{Session::get('updatedMessage')}}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Image</th>
                  <th>Created At</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
              </tfoot>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{Str::limit($post->body, 10, '...')}}</td>
                    <td><img height="50" src="{{$post->post_image}}" alt=""></td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="{{route('posts.edit',$post->id)}}"><button class="btn btn-danger">Edit</button></a></td>
                    <td>
                        
                        <form method="POST" action="{{route('posts.destroy',$post->id)}}" enctype="multipart/form-data">
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
      {{-- {{$posts->links()}} --}}
    </div>
    </div>
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
        <!-- Page level custom scripts -->
    <script src="{{asset('js/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>
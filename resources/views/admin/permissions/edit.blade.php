<x-admin-master>

    @section('content')
     
<h1>Editing Permission: {{$permission->name}}</h1>

<div class="row">
    <div class="col-sm-3">
    <form action="{{route('permissions.update',$permission->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
<div class="row">
    <div class="col-lg-12">       
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                    </tr>
                  </tfoot>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->slug}}</td>
                        </tr>
                        @endforeach          
                    </tbody>
                </table>
              </div>
            </div>       
          </div>
        </div>
</div>



    @endsection



</x-admin-master>
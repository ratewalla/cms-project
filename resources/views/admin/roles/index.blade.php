<x-admin-master>


    @section('content')

    <h1>Roles</h1>

@if (session()->has('roleUpdatedMessage'))
<div class="alert alert-success">{{session('roleUpdatedMessage')}}</div>
@endif
@if (session()->has('roleMessage'))
<div class="alert alert-danger">{{session('roleMessage')}}</div>
@endif

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('roles.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror">
                </div>
                <div>
                    @error('name')
                        <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary btn-block" name="sumit" >Create</button>
            </form>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                      </tfoot>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td><a class="btn btn-light" href="{{route('roles.edit', $role->id)}}">Edit</a></td>
                                <td>
                                    <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
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
        </div>
    </div>


    @endsection



</x-admin-master>
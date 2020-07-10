<x-admin-master>


@section('content')


@if(auth()->user()->userHasRole('admin'))
    <h1 class="h3 mb-4 text-gray-800">Admin Page</h1>
@else
    <h1 class="h3 mb-4 text-gray-800">Home Page</h1>
@endif


@endsection


</x-admin-master>
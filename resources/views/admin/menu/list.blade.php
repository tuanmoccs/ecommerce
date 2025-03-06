@extends('admin.main')
@section('content')
<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        
            {!! \App\Helper\Helper::menu($menus) !!} {{-- data truyen qua tu controller  --}}
        
    </tbody>
</table>
@endsection
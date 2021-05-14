@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Overall Customer Lists</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->last_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->dob }}</td>
            <td>{{ $customer->status }}</td>
            <td>
                <form method="POST">   
                    <a class="btn btn-info" href="{{ route('admin.approve',$customer->id) }}">Apporved</a>
      
                    <a class="btn btn-danger" href="{{ route('admin.deny',$customer->id) }}">Deny</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $customers->links() !!}
    </div>
</div>
@endsection

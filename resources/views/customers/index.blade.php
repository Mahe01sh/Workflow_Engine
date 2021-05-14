@extends('customers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Lists</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> New Customer</a>
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
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}"><i style="font-size:16px" class="fa">&#xf044;</i></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $customers->links() !!}
      
@endsection
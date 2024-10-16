@extends('layouts.app')

@section('contents')
<section>

    <div class="row container-fluid py-5 justify-content-center">
        <div class="col-12 py-4 text-center">
            <h3>Customers</h3>
        </div>
        <div class="col-md-9 border">
            

            <div class="row my-4">
                <div class="col-2"> 
                    <a href="{{ route('customers.create') }}" class="btn btn-primary py-2">Add Customer</a>
                </div>

                <div class="col-5">
                    <form action="{{ route('customers.index') }}" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="search customer" 
                                value="{{ request()->search }}">
                            <!-- <button class="btn btn-primary" type="submit">Search</button> -->
                        </div>
                    </form>
                </div>

                <div class="col-3">
                    <form action="{{ route('customers.index') }}" method="get" class="form-order">
                        <div class="form-group">
                            <select name="order" id="sort" class="form-control" onchange="$('.form-order').submit()">
                                <option value="">sort</option>
                                <option @selected(request()->order == 'desc') value="desc">Newest to Old</option>
                                <option @selected(request()->order == 'asc') value="asc">Oldest to newest</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col">
                    <a href="{{ route('customers.trash') }}" class="btn btn-secondary">Trash</a>
                </div>

            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $customer->firstname }}</td>
                        <td>{{ $customer->lastname }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->account_number }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                            <a href="{{ route('customers.show', $customer->id) }}">Show</a>
                            <form action="{{  route('customers.destroy', $customer->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>
@endsection
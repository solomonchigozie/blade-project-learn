@extends('layouts.app')

@section('contents')
<section>
    <div class="row container-fluid py-5 justify-content-center">
        <div class="col-md-6 border py-3" style="background-color: #e1e1e147;">
            <div class="my-4 d-flex justify-content-end">
                <a href="{{ route('customers.index') }}" class="btn btn-primary px-3 py-2 ">Go back</a>
            </div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger my-3">{{$error}}</div>
                @endforeach

            @endif

            <form method="post" action="{{ route('customers.update',$customer->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img src="{{$customer->image }}" alt="" class="img-fluid">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" class="form-control" value="{{ $customer->firstname }}">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="form-control" value="{{ $customer->lastname  }}">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $customer->email  }}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="phone" class="form-control" name="phone" value="{{ $customer->phone  }}">
                </div>
                <div class="form-group">
                    <label>Bank Account</label>
                    <input type="number" class="form-control" name="accountnumber"  value="{{ $customer->account_number }}">
                </div>
                <div class="form-group">
                    <label>Abount</label>
                    <textarea name="about" id="about" class="form-control">{{ $customer->about  }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</section>
@endsection
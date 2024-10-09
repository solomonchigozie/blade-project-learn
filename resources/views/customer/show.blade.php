@extends('layouts.app')

@section('contents')
<section>
    <div class="row container-fluid py-5 justify-content-center">
        <div class="col-md-6 border py-3" style="background-color: #e1e1e147;">
            <div class="my-4 d-flex justify-content-end">
                <a href="{{ route('customers.index') }}" class="btn btn-primary px-3 py-2 ">Go back</a>
            </div>
            <div class="bg-secondary" style="width: 100%; height: 200px; display:flex; justify-content:baseline">
                <div class="d-flex">
                    <img src="{{$customer->image}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">First name</div>
                <div class="col border py-3"> {{ $customer->firstname }} </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">First name</div>
                <div class="col border py-3"> {{ $customer->firstname }} </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">First name</div>
                <div class="col border py-3"> {{ $customer->firstname }} </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">Last name</div>
                <div class="col border py-3"> {{ $customer->lastname }} </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">Email</div>
                <div class="col border py-3"> {{ $customer->email}} </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">Phone Number</div>
                <div class="col border py-3"> {{ $customer->phone }} </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="col border py-3">About</div>
                <div class="col border py-3"> {{ $customer->about }} </div>
            </div>

            

        </div>
    </div>
</section>
@endsection
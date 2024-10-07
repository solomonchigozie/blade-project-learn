@extends('app')

@section('contents')
<!-- Contact Section -->
  <section id="contact" class="container py-5">
    <h2 class="text-center mb-4">Contact Us</h2>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger my-3">{{$error}}</div>
        @endforeach

    @endif
    <form action="{{ route('contact.submit') }}" method="post">
        @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Your Name">
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email">
        </div>
      </div>
      <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Your Name">
        </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" rows="4" name="message" placeholder="Your Message">{{ old('message') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Send Message</button>
    </form>
  </section>

@endsection
@extends('app')

@section('contents')
<!-- Contact Section -->
  <section id="contact" class="container py-5">
    <h2 class="text-center mb-4">Upload File</h2>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger my-3">{{$error}}</div>
        @endforeach

    @endif
    <form action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
          <label for="file">File</label>
          <input type="file" class="form-control" id="file" name="file" placeholder="File">
          @error('file')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      <button type="submit" class="btn btn-primary btn-block">Send Message</button>
    </form>

    <table>
      <tbody>
        @foreach($files as $file)
          <td> <img src="{{ asset($file->file_path) }}" style="width:250px; margin-top:50px"  alt=""> </td>
        @endforeach
      </tbody>
    </table>

    <table>
      <tbody>
          <td> <a href="{{ route('file.download') }}">Download</a> </td>
      </tbody>
    </table>


  </section>

@endsection
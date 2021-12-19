@extends('theme.default')

@section('heading')
تعديل الناشر 
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="card mb-4 col-md-8">
    <div class="card-header text-right">
      تعديل الناشر 
    </div>
    <div class="card-body">
      <form action="{{ route('publishers.update', $publisher) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">اسم الناشر</label>
          <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $publisher->name }}" autocomplete="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>        
        <div class="form-group row">
          <label for="address" class="col-md-4 col-form-label text-md-right">العنوان </label>
          <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $publisher->address }}" autocomplete="address">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row mb-0">
          <div class="col-md-1">
            <button type="submit" class="btn btn-success">عدل</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    
@endsection

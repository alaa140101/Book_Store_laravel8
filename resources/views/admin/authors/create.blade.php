@extends('theme.default')

@section('heading')
إضافة مؤلف جديد    
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="card mb-4 col-md-8">
    <div class="card-header text-right">
      اضف مؤلف جديد
    </div>
    <div class="card-body">
      <form action="{{ route('authors.index') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">اسم المؤلف</label>
          <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>        
        <div class="form-group row">
          <label for="description" class="col-md-4 col-form-label text-md-right">الوصف</label>
          <div class="col-md-6">
            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ old('description') }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>  
        <div class="form-group row mb-0">
          <div class="col-md-1">
            <button type="submit" class="btn btn-primary">اضف</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    
@endsection

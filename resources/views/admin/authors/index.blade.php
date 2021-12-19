@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" >
@endsection

@section('heading')
عرض المؤلفين    
@endsection

@section('content')
  <a href="{{ route('authors.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>اضف مؤلف جديد</a>    
  <hr>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-stribed text-right" id="authors-table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>خيارات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($authors as $author)
            <tr>
              <td>{{ $author->name }}</td>
              <td>{{ $author->description }}</td>
              <td>
                <a href="{{ route('authors.edit', $author) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>تعديل</a>
                <form class="d-inline-block" action="{{ route('authors.destroy', $author) }}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i> حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('script')
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>    
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>   
<script>
  $(document).ready(function() {
    $('#books-table').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json"
      }
    });
  });
</script> 
@endsection
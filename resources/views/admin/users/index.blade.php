@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" >
@endsection

@section('heading')
عرض المستخدمين    
@endsection

@section('content')
  <hr>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-stribed text-right" id="categories-table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>البريد الالكتروني</th>
            <th>نوع المستخدم</th>
            <th>خيارات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->isSuperAdmin() ? 'مدير عام' : ($user->isAdmin() ? 'مدير' : 'مستخدم') }}</td>
              <td>
                <form action="{{ route('users.update', $user) }}" method="post" class="ml-4 form-inline" style="display: inline-block">
                  @method('PATCH')
                  @csrf
                  <select name="adminstration_level" id="" class="form-control form-control-sm">
                    <option selected disabled>اختر نوعا</option>
                    <option value="0">مستخدم</option>
                    <option value="1">مدير</option>
                    <option value="2">مدير عام</option>
                  </select>
                  <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>تعديل</button>
                </form>
                <form action="{{ route('users.destroy', $user) }}" method="post"  style="display: inline-block">
                  @method('DELETE')
                  @csrf
                  @if (auth()->user() != $user)
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i> حذف</button>
                  @else 
                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> حذف</button>
                  @endif
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
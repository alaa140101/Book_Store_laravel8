@extends('theme.default')

@section('heading')
عرض تفاصيل التصنيف
@endsection

@section('head')
  <style>
    table {
      table-layout: fixed;
    }
    table tr th {
      width: 30%;
    }
  </style>    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">عرض تفاصيل التصنيف</div>

                <div class="card-body">
                   <table class="table table-stribed">
                     <tr>
                       <th>الاسم</th>
                       <td class="lead"><b>{{ $category->name}}</b></td>
                     </tr>                    
                     <tr>
                       <th>الوصف</th>
                       <td>{{ $category->description }}</td>
                     </tr>
                   </table>
                   <a href="{{ route('categories.edit', $category) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>تعديل</a>
                   <form class="d-inline-block" action="{{ route('categories.destroy', $category) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i> حذف</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">معرض الكتب</div>
                
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form action="{{ route('search') }}" class="form-inline col-md-6 justify-content-center" method="GET">
                            <input type="text" name="term" class="form-control mx-sm-3 mb-2" id="">
                            <button type="submit" class="btn btn-secondary mb-2">ابحث</button>
                        </form>
                    </div>
                    <hr>
                    <br>
                    <h3>{{ $title }}</h3>
                    <div class="row">
                      @if ($books->count())
                        @foreach ($books as $book)
                            @if ($book->number_of_copies > 0)
                                <div class="col-lg-3 col-md-6 col-6 mb-3">
                                    <div class="d-block mb-2 h-100 border rounded p-3">
                                        <a href="{{route('book.details', $book->id)}}" style="color:#525252;">                                        
                                            <img src="{{ asset('storage/' .$book->cover_image) }}" alt="" class="img-fluid img-thumbnail">
                                            <b><p style="height: 25px">{{ $book->title}}</p></b>
                                        </a>

                                        <span class="score">
                                            <div class="score-wrap">
                                                <span class="stars-active" style="width: {{ $book->rate()*20 }}%">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <span class="stars-inactive">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </span>
                                        @if ($book->category != NULL)
                                        <br><a href="{{route('gallery.categories.show', $book->category)}}" style="color:#525252">{{ $book->category->name }}</a>                              
                                        @endif
                                        @if ($book->authors->isNotEmpty())
                                            <br><b> تأليف</b>
                                            @foreach ($book->authors as $author)
                                                {{ $loop->first ? '' : 'و'}}
                                                <a href="{{route('gallery.authors.show', $author)}}" style="color:#525252">{{$author->name}}</a>

                                            @endforeach
                                        @endif
                                        <br>
                                        <b>السعر: </b>{{$book->price}} $

                                        @auth
                                            <form action="{{ route('cart.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $book->id }}">
                                                <input type="number" name="quantity" class="form-control" id="" value="1" min="1" max="{{ $book->number_of_copies }}" style="width: 40%; float: right" required>
                                                <button type="submit" class="btn btn-primary" style="margin-right: 10px">اضف <i class="fas fa-cart-plus"></i></button>
                                            </form>    
                                        @endauth
                                    </div>
                                </div>
                                
                            @endif
                            
                        @endforeach
                        @else
                        <h3 style="margin: 0 auto;">لا يوجد نتايج</h3>
                        
                          
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ol>
                @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ol>
        </div>
        @endif 
        <form method="POST">
            @csrf
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title"  class="form-control">
            </div>
            <div class="form-group">
              <label>Body</label>
              <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label>Catagories</label>
              <select name="category_id" class="form-control" >
                  @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">
                    {{ $category['name'] }}
                    </option>
                  @endforeach
              </select>
              <input type="submit" value="Add Article" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
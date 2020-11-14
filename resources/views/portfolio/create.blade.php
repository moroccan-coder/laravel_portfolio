@extends('layouts/app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (count($errors))
                <div class="alert alert-danger" role="alert">
                    <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
                </div>
            @endif

        <form action="{{url('/portfolios')}}" method="POST">
            {{ csrf_field() }}

             <div class="form-groupe">
                 <label for="Title">Title</label>
             <input type="text" name="title" class="form-control" value="{{old('title')}}">
            </div>
            <br>
            <div class="form-groupe">
                <label for="Description">Description</label>

            <textarea name="description" class="form-control"  cols="30" rows="5">{{old('description')}}</textarea>
        
           </div>
             <br>
           <div class="form-groupe">
        
           <input type="submit" value="Save" class="form-control btn btn-primary">
       </div>

         </form>
        </div>
    </div>
</div>

   
@endsection
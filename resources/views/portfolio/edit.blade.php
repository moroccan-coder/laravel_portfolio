@extends('layouts/master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{url('/portfolios/'.$portfolio->id)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}

             <div class="form-groupe">
                 <label for="Title">Title</label>
             <input type="text" name="title" class="form-control" value="{{$portfolio->title}}">
            </div>
            <br>
            <div class="form-groupe">
                <label for="Description">Description</label>

                <textarea name="description" class="form-control" cols="30" rows="5">{{$portfolio->description}}</textarea>
        
           </div>
             <br>
           <div class="form-groupe">
        
           <input type="submit" value="Update" class="form-control btn btn-warning">
       </div>

         </form>
        </div>
    </div>
</div>

   
@endsection
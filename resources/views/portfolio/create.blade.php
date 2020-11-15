@extends('layouts/master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

        
        <form action="{{url('/portfolios')}}" method="POST">
            {{ csrf_field() }}

             <div class="form-groupe @if($errors->get('title')) has-error @endif">
                 <label for="Title">Title</label>
             <input type="text" name="title" class="form-control" value="{{old('title')}}">

             @if($errors->get('title'))
                 <ul>
                @foreach($errors->get('title') as $error)
                 <li style="color: red;">{{$error}}</li>
                @endforeach
                </ul>

             @endif

            </div>
            <br>
            <div class="form-groupe @if($errors->get('description')) has-error @endif">
                <label for="Description">Description</label>

            <textarea name="description" class="form-control"  cols="30" rows="5">{{old('description')}}</textarea>
            @if ($errors->get('description'))
                
                <ul>
                @foreach ($errors->get('description') as $error)
                    <li style="color: red;">{{$error}}</li>
                @endforeach
                </ul>

            @endif
        
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
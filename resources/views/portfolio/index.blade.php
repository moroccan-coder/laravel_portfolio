@extends('layouts.master')

@section('content')
    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h3>Portfolios List</h3>
        <div class="offset-10"><a class="btn btn-link" href="{{url('portfolios/create')}}"><u>New Portfolio</u></a></div>
          <br>
          


        <div class="row">
            
            @foreach ($portfolios as $item)
                
            
            <div class="col-sm-6 col-md-4">
    
                <div class="thumbnail">
                <img width="200" height="260" src="{{asset('storage/'.$item->pic)}}" alt="">
                    <div class="caption">
                    <h3>{{$item->title}}</h3>
                        <p>...</p>
                        <p>
                            
                        <form action="{{url('portfolios/'.$item->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}

                            <a href="#" class="btn btn-success" role="button">Show</a>
                        <a href="{{url('portfolios/'.$item->id.'/edit')}}" class="btn btn-primary" role="button">Update</a>
                        

                            <Button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </p>
                    </div>
                </div>
           
            </div>
        @endforeach
    


        </div>
    </div>
</div>  
</div>

@endsection
@extends('layouts.app')

@section('content')
    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session()->has('success_added'))
            
                <div class="alert alert-success">
                    {{session()->get('success_added')}}
                </div>

            @endif

            <h3>Portfolios List</h3>
        <div class="pull-right"><a class="btn btn-link" href="{{url('portfolios/create')}}"><u>New Portfolio</u></a></div>
            <table class="table">
                <head>
                    <tr>
                        <th>Title</th>
                        <th class="col-md-6">Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>

            
                </head>

                <body>

                    @foreach ($portfolios as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                       
                        <form action="{{url('portfolios/'.$item->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}

                            <a href="" class="btn btn-success">Show</a>
                            <a href="{{url('portfolios/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>

                            <Button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        
                    </td>
                    </tr>
                    @endforeach
                
                </body>


            </table>
        </div>
    </div>
</div>  

@endsection
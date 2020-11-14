@extends('layouts.app')

@section('content')
    

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Portfolios List</h3>
            <div class="pull-right"><a href="">New Portfolio</a></div>
            <table class="table">
                <head>
                    <tr>
                        <th>Title</th>
                        <th class="col-md-6">Description</th>
                        <th>Actions</th>
                    </tr>

            
                </head>

                <body>

                    @foreach ($portfolios as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                        <a href="" class="btn btn-success">Show</a>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                
                </body>


            </table>
        </div>
    </div>
</div>  

@endsection
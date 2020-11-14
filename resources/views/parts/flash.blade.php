
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success_added'))
            
            <div class="alert alert-success">
                {{session()->get('success_added')}}
            </div>

        @endif
        </div>
    </div>
</div>
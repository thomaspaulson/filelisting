
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Files</div>
                <div class="card-body">
                    @include('shared.navigation')
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Listing</div>
                <div class="card-body">
                    
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif                    
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">    
                            <label for="title">File:</label>
                            <input type="file" name="filename" id="filename">                            
                        </div>                       


                        <button type="submit" class="btn btn-primary">Add </button>
                    </form>                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    

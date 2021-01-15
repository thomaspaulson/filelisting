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
                    <table class="table">
                    <thead>
                        <tr>    
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td scope="row"> {{ $file['name'] }}</td>
                            <td> <a class="btn deletefile" data-filename="{{ $file['name'] }}"> delete </a> </td>
                        </tr>
                    @endforeach                                    
                    </tbody>
                    </table>
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection

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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($histories as $history)
                        <tr>
                            <td scope="row"> {{ $history->filename }}</td>
                            <td> {{ $history->type }} </td>
                        </tr>
                    @endforeach                                    
                    </tbody>
                    </table>
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection

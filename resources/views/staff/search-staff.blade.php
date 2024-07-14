@extends('app')

@section('css')

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .search-container {
        text-align: center;
    }

    #search-input {
        padding: 10px;
        font-size: 16px;
    }

    #search-button {
        background-color: #2196F3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

</style>
@endsection

@section('js')

<script>
    $(document).ready(function() {

    });
    $("#search-button").click(function() {
        location.href = "{{ URL('/search-staff') }}/" + $('#search-input').val();
    });
</script>

@endsection

@section('content')
    <div class="col m-2 p-2" style="border: solid black 1px;">
        <div class="row my-3">
            <div class="row col-md-12 d-flex justify-content-center" style="text-align: center;">
                    @csrf
                    <div class="row col-md-10 search-container">
                        <input class="col-md-10" type="text" id="search-input" @if($term)value="{{$term}}" @endif placeholder="Search...">
                        <button class="col-md-2" id="search-button">Search</button>
                    </div>
            </div>

        </div>
        <div class="row search-result" id="search-result">
            @if($staffs->count() > 0)
                @foreach($staffs as $staff)
                    <div class="col-md-4 mx-2" style="text-align: center; border: solid black 1px;">
                        <h4>{{$staff->name}}</h4>
                        <h5>{{$staff->getDesignation->designation_name}}</h5>
                        <h5>{{$staff->getDepartment->department_name}}</h5>
                    </div>
                @endforeach
            @else
                <div class="col-md-12" style="text-align: center;">
                    <h4>No results found</h4>
                </div>
            @endif
        </div>
    </div>
@endsection
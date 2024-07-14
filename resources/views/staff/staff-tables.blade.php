@extends('app')

@section('css')
<link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.css" rel="stylesheet">
@endsection

@section('js')
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#staff-table');
        new DataTable('#department-table');
        new DataTable('#designation-table');
    });
</script>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="err-msg row p-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        </div>
        <div class="col">
            <div class="row px-0 my-3">
                <div class="col-md-6" style="border: solid black 1px;">
                    <h3>Departments</h3>
                    <div class="col my-3">
                        <form action="/add-department" method="post" class="row-g3">
                            @csrf
                            <div class="row form-group col-md-12">
                                <label class="col-md-4 text-md-end" for="department">Department</label>
                                <input class="col-md-6" type="text" class="form-control" name="department" id="department"/>
                            </div>
                            <div class="row mt-3">
                                <button class="btn btn-primary col-md-3 mx-auto" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    <table class="table" id="department-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $dept)
                            <tr>
                                <td>{{$dept->department_id}}</td>
                                <td>{{$dept->department_name}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-6" style="border: solid black 1px;">
                    <h3>Designations</h3>
                    <div class="col my-3">
                        <form action="/add-designation" method="post" class="row-g3">
                            @csrf
                            <div class="row form-group col-md-12">
                                <label class="col-md-4 text-md-end" for="designation">Designation</label>
                                <input class="col-md-6" type="text" class="form-control" name="designation" id="designation"/>
                            </div>
                            <div class="row mt-3">
                                <button class="btn btn-primary col-md-3 mx-auto" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    <table class="table" id="designation-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Designation</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($designations as $desg)
                                <tr>
                                    <td>{{$desg->designation_id}}</td>
                                    <td>{{$desg->designation_name}}</td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row my-3 p-2" style="border: solid black 1px;">
                <div class="col-md-6">
                    <h3>Staffs</h3>
                    <div class="col my-3">
                        <form action="/add-staff" method="post" class="row-g3">
                            @csrf
                            <div class="row form-group col-md-12 mt-3">
                                <label class="col-md-4 text-md-end" for="name">Name</label>
                                <input class="col-md-6" type="text" class="form-control" name="name" id="name"/>
                            </div>
                            <div class="row form-group col-md-12 mt-3">
                                <label class="col-md-4 text-md-end" for="designation">Designation</label>
                                <div class="col-md-6 mx-0 px-0">
                                <select class="form-select" name="designation" id="designation">
                                    @foreach($designations as $desg)
                                        <option value="{{$desg->designation_id}}">{{$desg->designation_name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row form-group col-md-12 mt-3">
                                <label class="col-md-4 text-md-end" for="department">Depatment</label>
                                <div class="col-md-6 mx-0 px-0">
                                <select class="form-select" name="department" id="department">
                                    @foreach($departments as $dept)
                                        <option value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row form-group col-md-12 mt-3">
                                <label class="col-md-4 text-md-end" for="phone">Phone</label>
                                <input class="col-md-6" type="text" name="phone" class="form-control" placeholder="9656313212" value="@if(old('phone')){{old('phone')}}@endif"/>
                            </div>
                            <div class="row mt-3">
                                <button class="btn btn-primary col-md-3 mx-auto" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Existing Staffs</h3>
                    <table class="table staff-table" id="staff-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Staff name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{$staff->user_id}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->getDepartment->department_name}}</td>
                                    <td>{{$staff->getDesignation->designation_name}}</td>
                                    <td>{{$staff->phone_no}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
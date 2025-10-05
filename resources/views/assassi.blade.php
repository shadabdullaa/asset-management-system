@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Asset Assignment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Asset Assignment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Header (Page header) -->


    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asset Assignment</h3>
                            <button type="button" class="btn btn-custon-rounded-three btn-success btn-sm" data-toggle="modal" data-target="#add" style="margin-left: 74%">
                                <i class="fa fa-plus"></i> Add Assignment
                            </button>
                            <div class="modal fade" id="add">

                                <!-- start /.modal-dialog -->
                                <div class="modal-dialog modal-static">
                                    <form action="{{ route('assets.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Asset Assignment</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="asset_id">Item</label>
                                                        <select class="form-control" name="asset_id" required>
                                                            <option value="">Select Asset</option>
                                                            @foreach($assets as $asset)
                                                                <option value="{{ $asset->id }}">{{ $asset->asset_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="employee_id">Employee</label>
                                                        <select class="form-control" name="employee_id" required>
                                                            <option value="">Select Employee</option>
                                                            @foreach($employees as $employee)
                                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="condition">Condition</label>
                                                        <input type="text" class="form-control" name="condition" placeholder="Enter Condition .." required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="assignment_date">Date Assign</label>
                                                        <input type="date" class="form-control" name="assignment_date" placeholder="Enter Date" required/>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end /.modal-dialog -->
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Employee Name</th>
                                        <th>Department</th>
                                        <th>Condition</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assignments as $assignment)
                                    <tr>
                                        <td>{{ $assignment->asset_name }}</td>
                                        <td><a href="#">{{ $assignment->user->name }}</a></td>
                                        <td>{{ $assignment->department->department_name }}</td>
                                        <td>{{ $assignment->condition }}</td>
                                        <td>{{ $assignment->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- End /.card-header -->

                    </div>
                </div>
            </div>
</div>
@endsection

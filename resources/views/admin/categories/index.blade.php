@extends('layouts.admin')
@section('content')
<h1 class="mt-4">Categories</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
<div class="row mb-4">
    <div class="col-xl-12">
        <button class="btn btn-success" data-toggle="modal" data-target="#new-category"><i class="fas fa-plus"></i> New</button>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="new-category" tabindex="-1" role="dialog" aria-labelledby="newCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="newCategory">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-xl-12">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-12">
                            <label for="description">Category Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group form-check row">
                        <div class="col-xl-12">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input">
                            <label for="is_active" class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-12">
                            <label for="parent">Category Description</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="">Select a parent</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin/js/categories.js')}}"></script>
@endpush
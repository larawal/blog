@extends('layouts.admin')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Categories</h3>
        </div>
        <div>
            <button data-toggle="modal" data-target="#new-category" class="btn btn-lg btn-secondary m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill">
                <i class="la la-plus"></i>
            </button>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                List
                                <small>manage your items</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="categories_list_ajax" class="dd"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
        <div id="edit_ajax" class="col-lg-6" style="display:none;">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--skin-dark m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Edit&nbsp;<strong id="id_placeholder">#<span></span></strong>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="javascript:void(0);" class="m-portlet__nav-link m-portlet__nav-link--icon" onclick="categories.close();">
                                    <i class="la la-close"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="edit_item_ajax"></div>
                </div>
                <div class="m-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                            Portlet footer:
                        </div>
                        <div class="col-lg-6 m--align-right">
                            <a href="javascript:void(0);" onclick="categories.save();" class="btn btn-success">Save</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>

<div class="modal fade" id="new-category" tabindex="-1" role="dialog" aria-labelledby="newCategory" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="newCategory">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-xl-12">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-12">
                            <label for="slug">Category Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
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
                            <label for="parent">Parent Category</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="">Select a parent</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="categories.add();">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin/js/jquery.nestable.js')}}"></script>
<script src="{{asset('admin/js/modules/categories.js')}}"></script>
@endpush
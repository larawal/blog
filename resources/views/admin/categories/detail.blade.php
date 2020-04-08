<div class="form-group row">
    <div class="col-xl-12">
        <label for="edit_name">Category Name</label>
        <input type="text" name="edit_name" id="edit_name" class="form-control" value="{{$category->name}}" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-xl-12">
        <label for="edit_slug">Category Slug</label>
        <input type="text" name="edit_slug" id="edit_slug" class="form-control" value="{{$category->slug}}" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-xl-12">
        <label for="edit_description">Category Description</label>
        <textarea name="edit_description" id="edit_description" cols="30" rows="5" class="form-control">{{$category->description}}</textarea>
    </div>
</div>
<div class="form-group form-check row">
    <div class="col-xl-12">
        <input type="checkbox" name="edit_is_active" id="edit_is_active" class="form-check-input" {{$category->is_active == 1 ? 'checked' : ''}}>
        <label for="edit_is_active" class="form-check-label">Active</label>
    </div>
</div>

<p><small>Created {{$category->created_at}}<br>Updated {{$category->updated_at}}</small></p>

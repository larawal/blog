<li class="dd-item dd3-item" data-id="{{$item->id}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content"><span>{{$item->id}} {{$item->name}}</span>
    <div class="ns-actions">
        <a href="javascript:void(0);" onclick="categories.edit(this);">
            <i class="fa fa-edit">&nbsp;</i>
        </a>
        <a href="javascript:void(0);" onclick="categories.remove(this);">
            <i class="fa fa-trash">&nbsp;</i>
        </a>
    </div>
    </div>{!! $fn !!}
</li>
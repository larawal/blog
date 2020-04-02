<ol class="dd-list">
    @foreach($categories as $category)
    <li class="dd-item" data-id="{{$category->id}}">
        <div class="dd-handle">{{$category->name}}</div>
    </li>
    @endforeach
</ol>
<script>
$(document).ready(function() {
    $('.dd').nestable({
        group: 1
    });
});
</script>
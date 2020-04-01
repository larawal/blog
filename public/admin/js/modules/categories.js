var categories = function() {
    var $ajax_container = $('#categories_list_ajax');

    var init = function() {
        _init_modal();
        _list_ajax();
    };

    var slug = function(str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    };

    var _init_modal = function() {
        $('#name').keyup(function() {
            $('#slug').val(slug($(this).val()));
        });
        $('#new-category').on('show.bs.modal', function() {
            _build_parents();
        });
        $('#new-category').on('hide.bs.modal', function() {
            $('#parent > option[value!=""]').remove();
            $('#new-category').find('form').trigger('reset');
        });
    };

    var _build_parents = function() {
        $.ajax({
            type: 'POST',
            url: ABSOLUTE_ADMIN_URL + 'categories/ajax/get-parents',
            dataType: 'json',
            success: function(res){
                $.each(res.list, function(index, value) {
                    $('#parent').append('<option value="'+index+'">'+value+'</option>');
                });
            },
            error: function(){
                console.log('callback error');
            }
        });
    };

    var _list_ajax = function() {
        $.ajax({
            type: 'POST',
            url: ABSOLUTE_ADMIN_URL + 'categories/ajax/list',
            dataType: 'json',
            success: function(res) {
                if(res.status) {
                    $ajax_container.html(res.html);
                } else {
                    $ajax_container.html(res.message);
                }
            },
            error: function() {
                console.log('callback error');
            }
        });
    };

    var add = function() {
        $.ajax({
            type: 'POST',
            url: ABSOLUTE_ADMIN_URL + 'categories/ajax/add',
            dataType: 'json',
            data: {
                name: $('#name').val(),
                slug: $('#slug').val(),
                description: $('#description').val(),
                is_active: $('#is_active').is(':checked') ? 1 : 0,
                parent: $('#parent').val()
            },
            success: function(res) {
                if(res.status) {
                    $('#new-category').modal('toggle');
                    toastr.success(res.message);
                    _list_ajax();
                } else {
                    toastr.error(res.message);
                }
            },
            error: function() {
                console.log('callbark error');
            }
        });
    };

    return {
        init: init,
        add: add
    }
}();
$(document).ready(function() {
    categories.init();
});
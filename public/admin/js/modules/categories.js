var categories = function() {
    var $ajax_container = $('#categories_list_ajax');

    var init = function() {
        _init_modal();
        _list_ajax();
        $('.dd').nestable({
            group: 1
        }).on('change', _save_tree);
    };

    var _save_tree = function(e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        if (window.JSON) {
            var json_data = window.JSON.stringify(list.nestable('serialize'));
            $.ajax({
                type: 'POST',
                url: ABSOLUTE_ADMIN_URL +'categories/ajax/save_tree',
                data: ({
                    tree: json_data
                }),
                success: function (res) {
                    if (res.status) {
                        toastr.success(res.message);
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function () {
                    console.log('callback error');
                }
            });
        }
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

    var edit = function(id) {
        $('#edit_ajax').show();
        $.ajax({
            type: 'POST',
            url: ABSOLUTE_ADMIN_URL + 'categories/ajax/detail',
            dataType: 'json',
            data: {
                id: id 
            },
            success: function(res) {
                if(res.status) {
                    $('#id_placeholder').find('span').html(id);
                    $('#edit_item_ajax').html(res.html);
                    $('#edit_name').keyup(function() {
                        $('#edit_slug').val(slug($(this).val()));
                    });
                } else {
                    $('#edit_item_ajax').html(res.message);
                }
            },
            error: function() {
                console.log('callback error');
            }
        });
    };

    var remove = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: ABSOLUTE_ADMIN_URL + 'categories/ajax/remove',
                    dataType: 'json',
                    data: {
                        id: id 
                    },
                    success: function(res) {
                        if(res.status) {
                            if($('#id_placeholder').find('span').html() == id) {
                                close();
                            }
                            Swal.fire(
                                'Deleted!',
                                res.message,
                                'success'
                            );
                            _list_ajax();
                        } else {
                            Swal.fire(
                                'Error!',
                                res.message,
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'callback error',
                            'error'
                        )
                    }
                });
            } else {
                Swal.fire(
                    'Declined!',
                    'Your file has not been deleted.',
                    'warning'
                )
            }
        });
    };

    var close = function() {
        $('#edit_item_ajax').empty();
        $('#edit_ajax').hide();
    };

    var save = function() {
        $.ajax({
            type: 'POST',
            url: ABSOLUTE_ADMIN_URL + 'categories/ajax/save',
            dataType: 'json',
            data: {
                id: $('#id_placeholder').find('span').html(),
                name: $('#edit_name').val(),
                slug: $('#edit_slug').val(),
                description: $('#edit_description').val(),
                is_active: $('#edit_is_active').is(':checked') ? 1 : 0
            },
            success: function(res) {
                if(res.status) {
                    toastr.success(res.message);
                    edit($('#id_placeholder').find('span').html());
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
        add: add,
        edit: edit,
        remove: remove,
        close: close,
        save: save
    }
}();
$(document).ready(function() {
    categories.init();
});
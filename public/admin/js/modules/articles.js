var articles = function() {
    var module_path = ABSOLUTE_ADMIN_URL + 'articles/';

    var list = function() {
        $("#articles").DataTable( {
            responsive:true,
            processing:true,
            serverSide:true,
            searching: false,
            ajax: {
                type: 'POST',
                url: module_path + 'ajax/list',
                dataType: 'json'
            },
            columns:[{
                data: "id"
            }, {
                data: "title"
            }, {
                data: "subtitle"
            }, {
                data: "slug"
            }, {
                data: "description"
            }, {
                data: null,
                class: 'text-center',
                render: function(data, type, row) {
                    return `<div class="m-btn-group m-btn-group--pill btn-group" role="group" aria-label="Actions">
                                <a role="button" href="`+module_path + data.slug+`" class="m-btn btn btn-info">
                                    <i class="la la-edit"></i>
                                </a>
                                <a role="button" href="javascript:void(0);" onclick="articles.remove('`+data.slug+`');" class="m-btn btn btn-danger">
                                    <i class="la la-trash"></i>
                                </a>
                            </div>`;
                }
            }], columnDefs:[ 
                { orderable: false, targets: [5] }
            ]
        });
    };

    var remove = function(slug) {
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
                /*$.ajax({
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
                });*/
            } else {
                Swal.fire(
                    'Declined!',
                    'Your file has not been deleted.',
                    'warning'
                )
            }
        });
    };

    return {
        list: list,
        remove: remove
    }
}();
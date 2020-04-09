var articles = function() {

    var init = function() {
        list();
    };

    var list = function() {
        $("#articles").DataTable( {
            responsive:true,
            processing:true,
            serverSide:true,
            searching: false,
            ajax: {
                type: 'POST',
                url: ABSOLUTE_ADMIN_URL + 'articles/ajax/list',
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
                    return '<a href="javascript:void(0);"><i class="la la-edit"></i></a>'; 
                }
            }], columnDefs:[ 
                { orderable: false, targets: [5] }
            ]
        });
    };

    return {
        init: init
    }
}();

$(document).ready(function() {
    articles.init();
});
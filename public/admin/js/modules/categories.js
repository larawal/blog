var categories = function() {
    var init = function() {
        _init_modal();
    };

    var _init_modal = function() {
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

    return {
        init: init
    }
}();
$(document).ready(function() {
    categories.init();
});
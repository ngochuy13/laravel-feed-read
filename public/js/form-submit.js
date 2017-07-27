$(document).ready(function(){
    $('.submit-button').click(function() {
        $formName = $(this).data('form');
        if ($formName) {
            $('#' + $formName).submit();
        } else {
            $(this).closest('form').submit();
        }
        return false;
    });

    // Delete image
    $('.submit-delete').click(function(){
        var id = $(this).data('id');
        var filename = $(this).data('filename');
        $.ajax({
            type: 'post',
            data: { id: id, filename: filename, _token :$('#csrf-token').val() },
            url: '/post/delete-image',
            dataType: 'JSON',
            success: function (data) {
                $("#image-" + id).remove();
            },
            error: function (data) {
            }
        });
    });
});

$(function () {
    $(document).on('click','.btn-delete-file',function () {
        console.log($(this));
        $(this).closest('div.file-item').remove();
    })
});
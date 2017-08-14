function check_uncheck_checkbox(isChecked) {
    if(isChecked) {
        $('.permission').each(function() {
            this.checked = true;
        });
    } else {
        $('.permission').each(function() {
            this.checked = false;
        });
    }
}

$("select[name='tinh']").change(function(){
    var id_tinh = $(this).val();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: baseUrl,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': token },
        data: {id_tinh:id_tinh},
        success: function(data) {
            $("select#huyen").html(data);
            console.log(data);
        }
    });
});

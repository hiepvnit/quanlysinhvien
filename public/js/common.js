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
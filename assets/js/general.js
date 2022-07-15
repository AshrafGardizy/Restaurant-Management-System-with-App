$(document).ready(function () {

    // iCheck
    $('input').iCheck({
      // base class added to customized checkboxes
      checkboxClass: 'icheckbox_square-red',
      // base class added to customized radio buttons
      radioClass: 'iradio_square-red'
    });
});

function confirmation() {
    var conf = window.confirm('آیا مطمئن هستید؟');
    if (conf == false) {
        return false;
    }
}

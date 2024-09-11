const prefix = 'GOM';
const suffix = '243';
$('#input-scaner').attr('placeholder', prefix + ' -');

function onCheckSignature(val) {

    if (val.includes(prefix) && val.includes(suffix)) {
        val = val.substring(val.indexOf('-') + 1);
        val = val.substring(0, val.lastIndexOf(suffix));
        console.log(val);
        return true;
    } else {
        console.log(val);
        return false;
    }
}
$('#scanner-form').on('submit', function(e) {
    e.preventDefault();
    $('.btn-loader').removeClass('d-none');
    const frm = new FormData(document.getElementById('scanner-form'));
    const xhr = new XMLHttpRequest();
    if (onCheckSignature($('#input-scaner').val())) {
        document.getElementById('input-scaner').value = "";
        $('#scanner-form').trigger('reset');
        toastr.success('Added donne');
        $('.btn-loader').addClass('d-none');
    } else toastr.error('Error occured');
})
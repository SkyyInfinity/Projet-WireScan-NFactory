$(document).ready(function () {
    $('#db_left').on('click', function(e) {
        e.preventDefault();
        console.log('left');
        var pid = $(this).parent().parent().parent().parent().attr("id");
        console.log(pid);
        pid = parseInt(pid.slice(-1));
        pid -= 1;
        pid = 'trame_' + pid;
        console.log(pid);
        $('#'+opid).hide();
        $('#'+npid).show();
    });
    $('#db_right').on('click', function(e) {
        e.preventDefault();
        console.log('right')
        var opid = $(this).parent().parent().parent().parent().attr("id");
        console.log(opid);
        pid = parseInt(opid.slice(-1));
        pid += 1;
        npid = 'trame_' + pid;
        console.log(npid);
        $('#'+opid).fadeOut();
        $('#'+npid).fadeIn()
    });
    
});
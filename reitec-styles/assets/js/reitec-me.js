// ------------------------------
$(document).bind("keyup keydown", function(e) {
    if (e.ctrlKey && e.keyCode == 80) {
        e.preventDefault();
        return false;
    }
});
$(document).on('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && (e.key === "p" || e.key === "c" || e.charCode === 16 || e.charCode === 112 || e.keyCode === 80)) {
        e.cancelBubble = true;
        e.preventDefault();
        e.stopImmediatePropagation();
        return false;
    }
});
$(document).ready(function(){
    function _upDateRMTTime(){
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'reitec-scripts/php/_xhr.request.php?_updateRMT=updatermt', true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState === xhr.DONE && xhr.status === 200){
                console.log('done');
            }
        }
        xhr.send(null);
    }
    function _taskMINUSRMT(name, hour, min, sec, delegate){
        var _task = {
            'name': name,
            'del': delegate,
            'time': (hour*3600 + min*60 + sec)
        }
        setInterval(function(){
            var date = new Date();
            if(date.getHours()*3600 + date.getMinutes()*60 + date.getSeconds() === _task.time){
                console.log(_task.time)
                _task.del()
                // _upDateRMTTime();
            }
        },1000)
    }
    _taskMINUSRMT('update_remaining_time',16,18,0,function(){
        console.log('req sent : ');
        _upDateRMTTime();
    })
})
$('.d-down-pannel').on('click', function() {
        if ($('.drop-down-').attr('dr-down') === 'hidden') {
            $('.drop-down-').attr('dr-down', 'shown');
            $('.drop-down-').removeClass('d-none');
        } else {
            $('.drop-down-').attr('dr-down', 'hidden');
            $('.drop-down-').addClass('d-none');
        }
    })
    // ------------------------------
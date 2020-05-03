var clock = new Vue({
    el: '#clock',
    data: {
        time: '',
        date: ''
    }
});

var week = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
var timerID = setInterval(updateTime, 1000);
updateTime();
function updateTime() 
{
    var cd = new Date();
    clock.time = zeroPadding(cd.getHours(), 2) + '：' + zeroPadding(cd.getMinutes(), 2) + '：' + zeroPadding(cd.getSeconds(), 2);
    clock.date = zeroPadding(cd.getFullYear(), 4) + '-' + zeroPadding(cd.getMonth()+1, 2) + '-' + zeroPadding(cd.getDate(), 2) + ' ' + week[cd.getDay()];
};

function zeroPadding(num, digit)
{
    var zero = '';
    for(var i = 0; i < digit; i++) 
	{
        zero += '0';
    }
    return (zero + num).slice(-digit);
}

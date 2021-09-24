require('./bootstrap');

require('chart.js');

window.animate_counter = function (DivIdtoAnimate, targetVal) {
    let divId = $(DivIdtoAnimate).text();
    $(DivIdtoAnimate).prop('Counter', parseInt(divId)).animate({
        Counter: parseInt(targetVal)
    }, {
        duration: timerCounter,
        easing: 'swing',
        step: function (now) {
            $(DivIdtoAnimate).text(Math.ceil(now));
        }
    });
}

window.populate_data_wallboard = function () {
    $.ajax({
        url: "/get_wallboard_data",
        type: "GET",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            Object.entries(data.singleNum).forEach(([key, value]) => {
                animate_counter('#'+key, parseInt(value));
            });
            document.getElementById('avgTimeToPickup').innerHTML = data.avgTimeToPickup;
            trafficChart.data = data.dailyInterval;
            trafficChart.update();
        },
        error: function (data) {
            console.log('ERR get_cms_hsplit');
            console.log(data);
        }
    });
    return false;
}

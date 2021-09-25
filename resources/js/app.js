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

let darkTime = false;
let themeSwitchFlag = false;

window.populate_data_wallboard = function () {
    $.ajax({
        url: "/get_wallboard_data",
        type: "GET",
        dataType: 'json',
        success: function (data) {
            Object.entries(data.singleNum).forEach(([key, value]) => {
                animate_counter('#'+key, parseInt(value));
            });
            document.getElementById('avgTimeToPickup').innerHTML = data.avgTimeToPickup;
            trafficChart.data = data.dailyInterval;
            trafficChart.update();
            if (darkTime != (data.singleNum['lastUpdateH'] < 6 || data.singleNum['lastUpdateH'] > 17)) {
                themeSwitchFlag = !themeSwitchFlag;
                darkTime = (data.singleNum['lastUpdateH'] < 6 || data.singleNum['lastUpdateH'] > 17);
            }
            if (themeSwitchFlag) {
                let navItem = document.getElementsByClassName("nav-item");
                if (darkTime) {
                    document.getElementById("body").classList.add("dark-mode");
                    document.getElementById("navbar").classList.remove("navbar-light");
                    document.getElementById("navbar").classList.add("navbar-dark");
                    for (let value of navItem) {
                        value.classList.add("navbar-dark");
                    }
                } else {
                    document.getElementById("body").classList.remove("dark-mode");
                    document.getElementById("navbar").classList.remove("navbar-dark");
                    document.getElementById("navbar").classList.add("navbar-light");
                    for (let value of navItem) {
                        value.classList.remove("navbar-dark");
                    }
                }
                themeSwitchFlag = !themeSwitchFlag;
            }
        },
        error: function (data) {
            console.log('ERR get_cms_hsplit');
            console.log(data);
        }
    });
    return false;
}

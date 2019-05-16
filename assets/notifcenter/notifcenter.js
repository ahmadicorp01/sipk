$(document).ready(function () {
    $("#NotificationContainer").animate({
        'top': '0'
    }, 400)

    $("#NotificationContainer").delay(3000).animate({
        'top': '-100px'
    }, 400)
})

$(function () {
    $("#Reload").click(function () {
        $("#NotificationContainer").animate({
            'top': '0'
        }, 400)

        $("#NotificationContainer").delay(3000).animate({
            'top': '-100px'
        }, 400)
    })
})  
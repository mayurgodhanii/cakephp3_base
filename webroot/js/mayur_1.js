/*
   --------------------------------
   Ajax Pagination In CakePHP
   --------------------------------
 # Author : Mayur Godhani
 # Developed At : Openxcell Technolabs
 # Created Date : 30-01-2016
 # Modified Date : 30-01-2016
 */

if (typeof jQuery === "undefined") {
    throw new Error("Requires jQuery");
}

var callData = function (el, e) {
    e.preventDefault();
    var url = el.attr('href').trim();
    if (url != "") {
        $.ajax({
            url: url
        }).done(function (data) {
            var found = $('.ajax-pagination tbody', data);

//            delete found[0];
//            var without_tbody = found.replace(/<\/?tbody>/g, '');
            $('.ajax-pagination tbody').remove();
            $('.ajax-pagination').append(found);
        });
    }
    return false;
}

var Mayur = function () {
    return {
        init: function () {
            $('#pagination-div').on('click', 'a', function (e) {
                callData($(this), e);
            });
        }
    };
}();
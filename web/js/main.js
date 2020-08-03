"use strict";
$(document).ready(function () {
    $('.hide-news').on('click', function () {
        $('.news-border, .hide-news').fadeOut(1000);
        //$('.hide-news').fadeOut(1000);
        $('.content').removeClass('col-md-8').addClass('col-md-12');
        $('.show-news').fadeIn();
        $('.show-news').on('click', function () {
            $('.news-border, .hide-news').fadeIn(1000);
            $('.content').removeClass('col-md-12').addClass('col-md-8');
            $('.show-news').hide();
        })

    });

    $("#news-visible").attr("checked", "checked");

    function showNews(news) {
        $('#news-modal .modal-body').html(news);
        $('#news-modal').modal();
    }

    $('.read-more').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            url: '/site/view',
            data: {id: id},
            type: 'get',
            success: function (res) {
                if (!res) alert('ОШИБКА');
                showNews(res);
                //console.log(res);
            },
            error: function () {
                alert('ERROR');
            }
        });
        return false;
    });
});
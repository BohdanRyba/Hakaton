// ajax for search
'use strict';
var search = document.querySelector('input[type="search"]');


search.onkeyup = function () {



    function  funcSearch(data) {
        $('.list_data>').remove();
        $('body').css('cursor','default');
        $('#loading>').remove();
        $('#loading').css('height','0px')
        $('.content-in').css('height','0');
        $('body').trigger('mask_ajax');
        $('.cont-box1>').remove();


        var list = JSON.parse(data);
        console.log(list);

        console.log('up');

        /*
         let container = document.createElement('div');

         render(searchQuery).forEach(function (element) {
         container.appendChild(element);
         });
         */
        var listGgroup = $('.cont-box1');

        var render = function(list) {
            var nameList = list.map(function (element) {
                console.log(element.event_name);
                var node= '<li><div class="list-search clr"><div><img class="bg_event_avatar" src="'+element.event_image+'" alt="wtf"/></div><div><span>Событие: ' + element.event_name + '</span></div></div></li>';

                return node;
            });
            return nameList;
        };

        const queryString = search.value.toLowerCase();
        console.log(queryString);
        let searchQuery = list.filter(function (element) {
            return element.event_name.toLowerCase().includes(queryString);
        });

        let $container = $('.list_data');
        render(searchQuery).forEach(function(element) {
            $container.append(element);
        });
    }

    $('.list_data>').remove();
    $('body').trigger('dow_search_list');
    $.ajax({
        url: 'ajax_eventShow',
        type: 'POST',
        dataType: 'html',
        beforeSend: funcBefore,
        success:funcSearch
    });
};
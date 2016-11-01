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
        /*for(let i=0; i<4; i++){
            viewsObj(list[i]);
        };*/
        const queryString = search.value.toLowerCase();
        console.log(queryString);
        let searchQuery = list.filter(function (element) {
            return element.event_name.toLowerCase().includes(queryString);
        });
        let $container= $('.list_data');
        render(searchQuery).forEach(function(element) {
            $container.append(element);
        });
    };





    $('.list_data>').remove();
    $('body').trigger('dow_search_list');
    $.ajax({
        url: 'ajax_eventShow',
        type: 'POST',
        dataType: 'html',
        beforeSend: funcBefore,
        success:funcSearch
    });
    'use strict';










/*
    var render = function(list) {
        var nameList = list.map(function(element) {
            //h4
            let h4 = document.createElement('h4');
            h4.className = 'list-group-item-heading';
            h4.innerHTML = element.club_name;
            //p
            let p = document.createElement('p');
            p.className = 'list-group-item-text';
            p.innerHTML = element.description;
            //*span
            let span = document.createElement('span');
            span.className = 'label label-info';
            span.innerHTML = `Date: ${element.date}`;
            //a - main node
            let node = document.createElement('a');
            node.className = 'list-group-item';
            node.href = element.href;

            node.appendChild(h4);
            node.appendChild(p);
            node.appendChild(span);
            return node;
        });
        return nameList;
    };

    window.onload = function() {
        let container = document.createElement('div');
        render(list).forEach(function(element) {
            container.appendChild(element);
        });

        let listGgroup = document.querySelector('.list-group');
        listGgroup.replaceChild(container, listGgroup.childNodes[0]);
    };
    */
};/**
 * Created by AgurSoft on 01.11.2016.
 */

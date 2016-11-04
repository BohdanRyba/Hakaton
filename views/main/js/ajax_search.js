// ajax for search event
'use strict';
let search = document.querySelector('input[type="search"]');


search.onkeyup = function () {
    $('.list_information').slideDown(300);

    $('body').trigger('dow_search_list');
    $.ajax({
        url: 'ajax_eventShow',
        type: 'POST',
        dataType: 'html',
        success:funcSearch
    });
};

function  funcSearch(data) {      //function collects node 
    $('.list_data>').remove();
    let list = JSON.parse(data);

    let render = function(list) {
        let nameList = list.map(function (element) {
            console.log(element.event_name);
            let node =  '<li>'
                            +'<div class="list-search clr">'
                                +'<div>'
                                    +'<img class="bg_event_avatar" src=" '+ element.event_image +' " alt="wtf"/>'
                                +'</div>'
                                +'<div>'
                                    +'<span>Событие: '+ element.event_name +' </span>'
                                +'</div>'
                            +'</div>'
                        +'</li>';
            return node;
        });
        return nameList;
    };

    // It determines whether the array contains the search request
    const queryString = search.value.toLowerCase();
    let searchQuery = list.filter(function (element) {
        return element.event_name.toLowerCase().includes(queryString); 
    });

    // add search result in DOM
    let $container = $('.list_data');
    render(searchQuery).forEach(function(element) {
        $container.append(element);
    });
};
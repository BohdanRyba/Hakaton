// ajax for search event
'use strict';
let search = document.querySelectorAll('input[type="search"]');

search[0].onkeyup = function (typeSearch) {
    $('.bg-opacity').show(200);
    $('.list_information').show();
    $('body').trigger('dow_search_list');
    let id= $('#organization').attr('data-id');
    id= parseInt(id);

    $.ajax({
        url: 'ajax_eventShow',
        type: 'POST',
        data:'id='+id,
        dataType: 'html',
        success:funcSearch
    });
};

$('#search_event_go').on('click', function(){
   let id= $('#organization').attr('data-id');
   id= parseInt(id);
   $.ajax({
        url: 'ajax_eventShow',
        type: 'POST',
        data:'id='+id,
        dataType: 'html',
        success:funcSearchPrint
    });
});

function  funcSearch(data) {      //function collection node with the search result    
    $('.list_data>').remove();
    let list = JSON.parse(data);

    let render = function(list) {
        let nameList = list.map(function (element) {
            let node =  '<li>'
                            +'<div class="list-search clr">'
                                +'<div>'
                                    +'<img class="bg_event_avatar" src="'+ element.event_image +'" alt="wtf"/>'
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
    const queryString = search[0].value.toLowerCase();
    let searchQuery = list.filter(function (element) {
        return element.event_name.toLowerCase().includes(queryString); 
    });

    // add search result in DOM
    let $container = $('.list_data');
    render(searchQuery).forEach(function(element) {
        $container.append(element);
    });

};
function  funcSearchPrint(data) {      //function collection node with the search result    
    $('.cont-box1>').remove();
    let list = JSON.parse(data);

    let render = function(list) {
        let nameList = list.map(function (element) {
            let node = '<div class="resize-remove">'
        +'<div class="box-body">'
        +'<li class="result_search">'
            +'<div class="list-search clr">'
            +'<div>'
            +'<img class="bg_event_avatar" src=" '+ element.event_image +' " alt="wtf"/>'
            +'</div>'
            +'<div>'
            +'<span>Событие: '+ element.event_name +' </span>'
            +'</div>'
            +'</div>'
            +'</li>'
            +'</div>';
            return node;
        });
        return nameList;
    };

    // It determines whether the array contains the search request
    const queryString = search[0].value.toLowerCase();
    let searchQuery = list.filter(function (element) {
        return element.event_name.toLowerCase().includes(queryString); 
    });

    // add search result in DOM
    let $container = $('.cont-box1');
    render(searchQuery).forEach(function(element) {
        $container.append(element);
    });
    var $result_search= $('li.result_search');
    $result_search.wrapAll('<ul class="list_data"></ul>')

};
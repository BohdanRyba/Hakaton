//>>>>>>>>>>>>>>>>>>>>>>>>>>>      ajax for search event
$('.list-search').each(function(i){
    var search = $(this).parents('.search_wrap[style="display:block;"]').find('input[type="search"]');
//>>>>>>>>>>>>>>>>>>>>>>>>>>>      ajax search when print
console.log(search);
var searchName= search.attr('data-type');
search.on('keyup', function () {
    $('.bg-opacity').show();
    $('.list_information').show();
    actionAjaxSearch(searchName);
});
    //>>>>>>>>>>>>>>>>>>>>>>>       ajax search when press enter
    $('.search_event').on('keydown', function(e){
        console.log(searchName);
        let codKey= e.which;
        if(codKey===13){
            e.preventDefault();
            $('.list_information').slideUp(200);
            $('.list_data>').remove();
            actionAjaxSearchAddPage(searchName);
            $(this).on('keyup', function(){
                $('.bg-opacity').hide();
            });
        };
    });
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>    ajax search when click button GO!!!
    $('#search_event_go').on('click', function(e){
        e.preventDefault();
        $('.bg-opacity').hide();
        $('.list_information').slideUp(200);
        $('.list_data>').remove();
        actionAjaxSearchAddPage(searchName);
    });
    function actionAjaxSearch(searchName){
        var id= window.location.href;
        id=id.split('/');
        id=id[id.length-1];
        id= parseInt(id);
        $.ajax({
            url: 'ajax_'+searchName+'Show/'+id,
            type: 'POST',
            dataType: 'html',   
            //success:funcSearch
            success: function(m){/*console.log(m);*/}
        });
    };
    function actionAjaxSearchAddPage(searchName){
        
        var id= window.location.href;
        id=id.split('/');
        id=id[id.length-1];
        id= parseInt(id);
        $.ajax({
            url: 'ajax_'+searchName+'Show/'+id,
            type: 'POST',
            dataType: 'html',
            //success:funcSearchPrint
            success: function(m){console.log(m);}
        });
    };
//>>>>>>>>>>>>>>>>>>>>      function collection node with the search result for list
function funcSearch(data) {
    $('.list_data>').remove();
    let list = JSON.parse(data);
    console.log(data);
    let render = function(list) {
        let nameList = list.map(function (element) {
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
        //>>>>>>>>>      It determines whether the array contains the search request
        const queryString = search.val().toLowerCase();
        let searchQuery = list.filter(function (element) {
            return element.event_name.toLowerCase().includes(queryString);
        });
    // add search result in DOM
    let $container = $('.list_data');
    render(searchQuery).forEach(function(element) {
        $container.append(element);
    });
};
//>>>>>>>>>>>>>>>>>>>>      function collection node with the search result for load on page
function funcSearchPrint(data) {
                console.log(data);
        var list = JSON.parse(data);


    let render = function(list) {
        let nameList = list.map(function (element) {
            let node = '<div class="resize-remove">'
            +'<div class="box-body">'
            +'<li class="result_search">'
            +'<div class="list-search clr">'
            +'<div>'
            +'<img class="bg_event_avatar" src=" '+ element.event_image +' " alt="wtf"/>'
            +'</div>'   
            +'<span>Событие: '+ element.event_name +' </span>'
            +'</div>'
            +'</div>'
            +'</li>'
            +'</div>';
            return node;
        });
        return nameList;
    };
        //>>>>>>>>>>>>>>>>>>>>>>>>>>     It determines whether the array contains the search request
        const queryString = search.val().toLowerCase();
        let searchQuery = list.filter(function (element) {
            return element.event_name.toLowerCase().includes(queryString);
        });
        // add search result in DOM
        let $container = $('.list-group');
        render(searchQuery).forEach(function(element) {
            $container.children('.resize-remove').remove();
            $container.append(element);
        });
        var $result_search= $('li.result_search');
        $result_search.wrapAll('<ul class="list_data"></ul>');
    };
});
//>>>>>>>>>>>>>>>>>>>>>>>>       search result main close invisible background and clear list the result
$('.bg-opacity').on('click', function () {
    $(this).hide();
    $('.popup-control').hide(200);
    $('.list_information').slideUp(200);
    $('.list_data>').remove();
});


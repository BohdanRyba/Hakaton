//>>>>>>>>>>>>>>>>>>>>>>>>>>>        ajax for search event
console.log($('.list-search'));
$('.list-search').each(function(){
    let search = $(this).find('input[type="search"]');
    console.log(search);
//>>>>>>>>>>>>>>>>>>>>>>>>>>>         ajax search when print
var searchName= search.attr('data-type');
search.on('keyup', function () {
    $('.bg-opacity').show();
    $('.list_information').show();

    actionAjaxSearch(searchName);
});

    //>>>>>>>>>>>>>>>>>>>>>>>         ajax search when press enter
    $('.search_event').keydown(function(element){
        let codKey= element.which;
        if(codKey===13){
            element.preventDefault();

            $('.bg_opacity').hide();
            $('.popup-control').hide(200);
            $('.list_information').slideUp(200);
            $('.list_data>').eq(0).remove();

            actionAjaxSearchAddPage(searchName);
        };
    });

    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>      ajax search when click button GO!!!
    $('#search_event_go').on('click', function(){
        $('.bg_opacity').hide();
        $('.popup-control').hide(200);
        $('.list_information').slideUp(200);
        $('.list_data>').eq(0).remove();

        actionAjaxSearchAddPage(searchName);
    });

    function actionAjaxSearch(searchName){
        console.log("func run");
        var id= window.location.href;
        id=id.split('/');
        id=id[id.length-1];
        console.log(id);

        id= parseInt(id);
        $.ajax({
            url: 'ajax_'+searchName+'Show/'+id,
            type: 'POST',
            dataType: 'html',
            success:funcSearchPrint
        });
    };

    function actionAjaxSearchAddPage(searchName){
        var id= window.location.href;
        id=id.split('/');
        id=id[id.length-1];
        console.log(id);

        id= parseInt(id);
        $.ajax({
            url: 'ajax_'+searchName+'Show/'+id,
            type: 'POST',
            dataType: 'html',
            success:funcSearchPrint
        });
    };

//>>>>>>>>>>>>>>>>>>>>      function collection node with the search result for list
function  funcSearch(data) {
    console.log("func run");
    $('.list_data>').remove();
    let list = JSON.parse(data);
    console.log(list);
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
function  funcSearchPrint(data){
    console.log("func run");
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

        //>>>>>>>>>>>>>>>>>>>>>>>>>>     It determines whether the array contains the search request
        const queryString = search.val().toLowerCase();
        let searchQuery = list.filter(function (element) {
            return element.event_name.toLowerCase().includes(queryString);
        });

        // add search result in DOM
        let $container = $('.cont-box1');
        render(searchQuery).forEach(function(element) {
            console.log($container);
            $container.children('.resize-remove').remove();
            $container.append(element);
        });
        var $result_search= $('li.result_search');
        $result_search.wrapAll('<ul class="list_data"></ul>');
    };




//>>>>>>>>>>>>>>>>>>>>>>>>       search result main close invisible background and clear list the result
$('body').on('click', '.bg-opacity', function () {
    $(this).hide();
    $('.popup-control').hide(200);
    $('.list_information').slideUp(200);
    $('.list_data>').eq(0).remove();
});


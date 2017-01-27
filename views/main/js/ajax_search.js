//>>>>>>>>>>>>>>>>>>>>>>>>>>>      ajax for search event
var search = $('.list-search').find('input[type="search"]');
var clubInfoObj= new Object();

search.on('keyup', function () {
    let search = $('.list-search').find('input[type="search"].active');
    let searchName= search.attr('data-type');
    $('.bg-opacity').show();
    $('.list_information').show();
    actionAjaxSearch(searchName);
});
    //>>>>>>>>>>>>>>>>>>>>>>>       ajax search when press enter
    $('.search_event').on('keydown', function(e){
        let codKey= e.which;
        if(codKey===13){
            e.preventDefault();
            var search = $('.list-search').find('input[type="search"].active');
            var searchName= search.attr('data-type');
            $('.list_information').slideUp(200);
            $('.list_data>').remove();
            actionAjaxSearchAddPage(searchName);
            $(this).on('keyup', function(){
                $('.bg-opacity').hide();
            });
        };
    });
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>    ajax search when click button GO!!!
    $('.search_event_go').on('click', function(e){
        var search = $('.list-search').find('input[type="search"].active');
        var searchName= search.attr('data-type');
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
            success:funcSearch
            //success: function(m){/*console.log(m);*/}
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
            success:funcSearchPrint
            //success: function(m){console.log(m);}
        });
    };
//>>>>>>>>>>>>>>>>>>>>      function collection node with the search result for list
function funcSearch(data) {
    console.log(data);
    $('.list_data>').remove();
    let list = JSON.parse(data);
    clubInfoObj= list;

    console.log(clubInfoObj);

    let search = $('.list-search').find('input[type="search"].active');
    let searchName = search.attr('data-type');
    let img= searchName+'_image';
    let name= searchName+'_name';
    let render = function(list) {
        let nameList = list.map(function (element, i) {

            let node =  '<li id="btn_go_'+ searchName +'_cabinet">'
            +'<a href="">'
            +'<div class="list-search clr" data-element-id="'+ element.id +'">'
            +'<div>'
            +'<img class="bg_event_avatar" src="'+ element[img] +'" alt="wtf"/>'
            +'</div>'
            +'<div>'
            +'<span>Название: '+ element[name] +' </span>'
            +'</div>'
            +'</div>'
            +'</a>'
            +'</li>';
            return node;
        });
        return nameList;
    };
        //>>>>>>>>>      It determines whether the array contains the search request
        const queryString = search.val().toLowerCase();
        let searchQuery = list.filter(function (element) {
            return element[name].toLowerCase().includes(queryString);
        });
    // add search result in DOM
    let $container = $('.list_data');
    render(searchQuery).forEach(function(element) {
        $container.append(element);
    });
};
//>>>>>>>>>>>>>>>>>>>>      function collection node with the search result for load on page
function funcSearchPrint(data) {
    var list = JSON.parse(data);
    let search = $('.list-search').find('input[type="search"].active');
    let searchName = search.attr('data-type');
    let img= searchName+'_image';
    let name= searchName+'_name';
    let $container = $('.list_data_page');
    $container.children().remove();
    let render = function(list) {
        let nameList = list.map(function (element) {
            let node = '<div class="resize-remove">'
            +'<div class="box-body">'
            +'<li class="result_search" id="btn_go_'+ searchName +'_cabinet">'
            +'<a href="">'
            +'<div class="list-search clr" data-element-id="'+ element.id +'">'
            +'<div>'
            +'<img class="bg_event_avatar" src=" '+ element[img] +' " alt="wtf"/>'
            +'</div>'   
            +'<span>Событие: '+ element[name] +' </span>'
            +'</div>'
            +'</div>'
            +'</a>'
            +'</li>'
            +'</div>';
            return node;
        });
        return nameList;
    };
        //>>>>>>>>>>>>>>>>>>>>>>>>>>     It determines whether the array contains the search request
        const queryString = search.val().toLowerCase();
        let searchQuery = list.filter(function (element) {
            return element[name].toLowerCase().includes(queryString);
        });
        // add search result in DOM
        $('.list-data>').remove();
        $('.cont-box1>').remove();
        render(searchQuery).forEach(function(element) {
            $container.append(element);
            
        });
    };

//>>>>>>>>>>>>>>>>>>>>>>>>       search result main close invisible background and clear list the result
$('.bg-opacity').on('click', function () {
    $(this).hide();
    $('.popup-control').hide(200);
    $('.list_information').slideUp(200);
    $('.list_data>').remove();
});



// new search for page registration with clubs
$('.club_search_box').find('input[type="search"]').on('keyup', function () {
    //if($(this).val() === 0){
        //$container.append(clubInfoObj.listClub);
    //}else{
        let searchName= $(this).attr('data-type');
        console.log(searchName);
        actionAjaxSearch(searchName);
    //}

});
function actionAjaxSearch(searchName){
    var id= window.location.href;
    id=id.split('/');
    id=id[id.length-1];
    id= parseInt(id);
    console.log(id);
    $.ajax({
        url: 'ajax_'+ searchName +'_Show/'+id,
        type: 'POST',
        dataType: 'html',   
        success:funcSearchClub
    });
};
function funcSearchClub(data) {
    console.log(data);
    let $container = $('.list_club_data');
    clubInfoObj.listClub = $container.children();
    $container.remove();
    let list = JSON.parse(data);

    console.log(clubInfoObj);

    let search = $('.list-search').find('input[type="search"].active');
    let searchName = search.attr('data-type');
    let img= searchName+'_image';
    let name= searchName+'_name';
    let render = function(list) {
        let nameList = list.map(function (element, i) {

            let node =  '<li data-club-id="'+ element.id +'">'
                            +'<div class="list-search clr">'
                                +'<div>'
                                    +'<img class="bg_event_avatar" src="'+ element[img] +'" alt="wtf"/>'
                                +'</div>'
                                +'<div>'
                                    +'<span>Название: '+ element[name] +' </span>'
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
            return element[name].toLowerCase().includes(queryString);
        });
    // add search result in DOM

    render(searchQuery).forEach(function(element) {
        $container.append(element);
    });
};
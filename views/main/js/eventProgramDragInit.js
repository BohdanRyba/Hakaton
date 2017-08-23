jQuery(function($) {
    //чи зробити перенос можливим тільки активного елемента? поміняти зміну активного класу на маусдаун замість клік?

    var $b = $('body'),
        $d = $(document);

    $d.on('mousedown', function (e) {
        $b.find('.active').each(function () {
            $(this).removeClass('active');
        });
        let $t = $(e.target),
            $lvl2 = $t.parents('.level-2');

        if ($lvl2.length == 0) {
            let $li = $t.parents('.draggable');
            if ($li.length > 0) {$li.addClass('active');} else if ($t.hasClass('draggable')) {$t.addClass('active');}
        } else if ($lvl2.length > 0) {
            let dragClass = '.'+$lvl2.attr('data-searchClass'),
                $li = $t.parents(dragClass);
            if ($li.length > 0) {$li.addClass('active');} else if ($t.hasClass(dragClass)) {$t.addClass('active');}
        }
    });

    $b.on('mousedown', function (e) {
       let $t = $(e.target);
        // console.log(t.parents('.level-2').length);
        if ($t.parents('.level-2').length == 0) {
            $('.category-main-holder').myDrag('.draggable', 'just-hovered', 200, [setPosition, getNewCategoriesOrder]);
        } else {
            let $h = $t.parents('.level-2');
            if ($h.length > 0) {
                let searchClass = '.'+$h.attr('data-searchClass');
                $h.myDrag(searchClass, 'just-hovered', 200);
            }
        }
    });


    //drag by keys
    function myScroll(elem, direction) {
        let distance = 1.05*(elem[0].getBoundingClientRect().height);
            // scroll = $d.scrollTop();
        // console.log('scroll');

        if (direction == 'up') {
            let dif = distance/20;
            let int = setInterval(function () {
                let scroll = $d.scrollTop();
                $d.scrollTop(scroll-dif);
            }, 20);
            setTimeout(function () {
                clearInterval(int);
            }, 401);
        } else if (direction == 'down') {
            let dif = distance/20;
            let int = setInterval(function () {
                let scroll = $d.scrollTop();
                $d.scrollTop(scroll+dif);
            }, 20);
            setTimeout(function () {
                clearInterval(int);
            }, 401);
        }
    }

    $d.on('keyup', function (e) {
        let $active = $b.find('.active');

        if (e.key == 'ArrowUp' && $active.length > 0) {

            if (!e.shiftKey) {
                let $newActive = $active.prev();

                if ($newActive.length > 0) {
                    $active.each(function () {
                        $(this).removeClass('active');
                    });
                    $newActive.addClass('active');
                } else if ($newActive.length == 0) {
                    $active.each(function () {
                        $(this).removeClass('active');
                    });
                    $active.parent().children().last().addClass('active');
                }
            } else {
                let $insertBefore = $active.prev();

                if ($insertBefore.length > 0) {
                    $active.insertBefore($insertBefore);
                    if ($active.hasClass('draggable')) {
                        myScroll($insertBefore, 'up');
                    }
                } else {
                    let $parent = $active.parent();
                    $active.remove();
                    $parent.append($active);
                    if ($active.hasClass('draggable')) {
                        $d.scrollTop($b[0].getBoundingClientRect().height);
                    }
                }
                setPosition();
                if ($active.hasClass('category')) {
                    getNewCategoriesOrder();
                }
            }


        } else if (e.key == 'ArrowDown' && $active.length > 0) {

            if (!e.shiftKey) {
                let $newActive = $active.next();

                if ($newActive.length > 0) {
                    $active.each(function () {
                        $(this).removeClass('active');
                    });
                    $newActive.addClass('active');
                } else if ($newActive.length == 0) {
                    $active.each(function () {
                        $(this).removeClass('active');
                    });
                    $active.parent().children().first().addClass('active');
                }
            } else {
                let $insertAfter = $active.next();

                if ($insertAfter.length > 0) {
                    $active.insertAfter($insertAfter);
                    if ($active.hasClass('draggable')) {
                        myScroll($insertAfter, 'down');
                    }
                } else {
                    let $parent = $active.parent();
                    $active.remove();
                    $parent.prepend($active);
                    if ($active.hasClass('draggable')) {
                        $d.scrollTop(0);
                    }
                }
                setPosition();
                if ($active.hasClass('category')) {
                    getNewCategoriesOrder();
                }
            }


        } else if (e.key == 'ArrowRight' && $active.length > 0) {

            let $lvl2 = $active.find('.level-2');

            if ($lvl2.length > 0) {
                $active.each(function () {
                    $(this).removeClass('active');
                });
                $lvl2.children().first().addClass('active');
            }

        } else if (e.key == 'ArrowLeft' && $active.length > 0) {

            let $draggable = $active.parents('.draggable');

            if ($draggable.length > 0) {
                $active.each(function () {
                    $(this).removeClass('active');
                });
                $draggable.addClass('active');
            }

        }
    });

//    pick department
    $b.on('click', '.department-item', function () {
        $(this).parents('.dropdown-menu').children().each(function () {
                $(this).removeClass('shown');
            });
        $(this).addClass('shown');
        function ajaxShowCategoriesAccordingToDep($this) {
            let id = $this.attr('data-id-department');
            $.ajax({
                type: "POST",
                url: 'ajax_showCategoriesAccordingToDep',
                data: 'id=' + id,
                success: function (msg) {
                    let categories = JSON.parse(msg);
                    console.log(categories);
                    let $mainHolder = $('.category-main-holder');
                    $mainHolder.empty();

                    let categoriesToPush = {};
                    categoriesToPush["length"] = categories.length;

                    for (let i = 0; i < categories.length; i++) {
                        let category = {};
                        category["category"] = categories[i]["d_c_program"] + ' ' + categories[i]["d_c_age_category"] + ' ' + categories[i]["d_c_nomination"] + ' ' + categories[i]["d_c_league"];
                        category["id"] = categories[i]["id"];
                        categoriesToPush[parseInt(categories[i]["sort_order"])] = category;
                    }

                    console.log(categoriesToPush);

                    for (let i = 1; i <= categoriesToPush["length"]; i++) {
                        $mainHolder.append('<li class="draggable category" data-id="'+ categoriesToPush[i]["id"] +'" data-checkstatus="unchecked">' +
                            '<div class="highlighter highlighterTop"></div>'+
                                '<div class="category-settings clearfix">'+
                            '<span class="count-number">'+ i +'.</span>'+
                            '<div class="count-system-wrapper clearfix" data-checkstatus="unchecked">'+
                            '<span class="count-system">СПР</span>'+
                            '<div class="dropdown count-system-dropdown">'+
                            '<button class="btn flat btn-default dropdown-toggle" type="button" id="chooseCountSystem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                            '<span class="caret"></span>'+
                            '</button>'+
                            '<ul class="dropdown-menu flat" aria-labelledby="chooseCountSystem">'+
                            '<li class="count-system-variant"><a>SPR 1</a></li>'+
                        '<li class="count-system-variant"><a>SPR 2</a></li>'+
                        '<li class="count-system-variant"><a>SPR 3</a></li>'+
                        '</ul>'+
                        '</div>'+
                        '</div>'+
                        '<p class="category-name main-content">'+ categoriesToPush[i]["category"] +'</p>'+
                        '<span class="participants-number"><span class="the-participants-number">173</span>чел.</span>'+
                            '<div class="round-wrapper clearfix" data-checkstatus="unchecked">'+
                            '<span class="round-selected">ТУР</span>'+
                            '<div class="dropdown round-dropdown">'+
                            '<button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                            '<span class="caret"></span>'+
                            '</button>'+
                            '<ul class="dropdown-menu flat" aria-labelledby="chooseRound">'+
                            '<li class="round-variant"><a>1/16</a></li>'+
                            '<li class="round-variant"><a>1/8</a></li>'+
                            '<li class="round-variant"><a>1/4</a></li>'+
                            '<li class="round-variant"><a>1/2</a></li>'+
                            '<li role="separator" class="divider"></li>'+
                            '<li class="new-round"><a>создать новое...</a></li>'+
                        '</ul>'+
                        '</div>'+
                        '</div>'+
                        '<div class="input-wrapper">'+
                            '<label class="participants-in-round">К-во <input class="participants-in-round-input" data-checkstatus="unchecked" type="text"></label>'+
                            '<label class="entrance-number">Заходы <input class="entrance-number-input" data-checkstatus="unchecked" type="text"></label>'+
                            '</div>'+
                            '<div class="show-dancers">'+
                            '<button type="button" title="показать участников" class="btn show-dancers-btn flat btn-default" aria-label="Left Align">'+
                            '<i class="fa fa-chevron-down" aria-hidden="true"></i>'+
                            '</button>'+
                            '</div>'+
                            '</div>'+
                            '<div class="highlighter highlighterBot"></div>'+
                            '<ul class="participants-holder level-2" data-searchClass="draggable4"></ul>'+
                            '</li>');
                    }

                    //refreshers
                    $('.participants-in-round-input').off("change keyup input click");
                    $('.participants-in-round-input').on("change keyup input click", permitNumbersOnly);
                    $('.participants-in-round-input').off('blur');
                    $('.participants-in-round-input').blur(participantsInputBlur);
                    $('.entrance-number-input').off("change keyup input click");
                    $('.entrance-number-input').on("change keyup input click", permitNumbersOnly);
                    $('.entrance-number-input').off('blur');
                    $('.entrance-number-input').blur(participantsInputBlur);

                    $('#department-name').text($this.text());
                },
                error: function (msg) {
                    console.log('ajax_showCategoriesAccordingToDep has failed to work!');
                }
            });
        }
        ajaxShowCategoriesAccordingToDep($(this));
    });

//    category settings

    function checkCategoryStatus($category) {
        let spr = $category.find('.count-system-wrapper').attr('data-checkstatus'),
            round = $category.find('.round-wrapper').attr('data-checkstatus'),
            number = $category.find('.participants-in-round-input').attr('data-checkstatus'),
            entrane = $category.find('.entrance-number-input').attr('data-checkstatus');

        if (spr  == "checked" && round == "checked" && number == "checked" && entrane == "checked") {
            $category.attr('data-checkstatus', 'completed');

        } else {
            $category.attr('data-checkstatus', 'unchecked');
        }
    }
    function setPosition() {
        $('.category').each(function () {
            $(this).find('.count-number').text($(this).index()+1 + '.');
        });
    }
    function permitNumbersOnly() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    }
    function participantsInputBlur() {
        if ($(this).val() != '') {
            $(this).attr('data-checkstatus', 'checked');
            //    !! add ajax here
        } else {
            $(this).attr('data-checkstatus', 'unchecked');
            //    !! add ajax here
        }
        checkCategoryStatus($(this).parents('.category'));
    }
    function getNewCategoriesOrder() {
        let order = {},
            dep = parseInt($('#pick-department').find('.shown').attr('data-id-department'));

        $('.category').each(function () {
            order[parseInt($(this).index()+1)] = $(this).attr('data-id');
        });

        $.ajax({
            type: "POST",
            url: 'ajax_getNewCategoriesOrder',
            data: {
                department_id: dep,
                categories: order
            },
            success: function (msg) {
                console.log(msg);
                // console.log('ajax_getNewCategoriesOrder has worked successfully!');
            },
            error: function (msg) {
                console.log('ajax_getNewCategoriesOrder has failed to work!');
            }
        });

        console.log(JSON.stringify(order));
        // console.log(order.toJSON());
        // return obj;
    }

    //count system
    $b.on('click', '.count-system-variant', function () {
        let spr = $(this).find('a').text(),
            $wrapper = $(this).parents('.count-system-wrapper');

        $(this).parents('.dropdown-menu').children().each(function () {
            $(this).removeClass('chosen');
        });
        $(this).addClass('chosen');
        $wrapper.find('.count-system').text(spr);
        $wrapper.attr('data-checkstatus', 'checked');
    //   !! ajax to be added here that sends the checked spr
        checkCategoryStatus($(this).parents('.category'));
    });

    // round
    $b.on('click', '.new-round', function () {

        let $holder = $(this).parents('.dropdown-menu'),
            maxRound = parseInt($holder.children().eq(0).text().split('/')[1])*2;

        $holder.prepend('<li class="round-variant"><a>1/'+maxRound+'</a></li>');
    });

    $b.on('click', '.round-variant', function () {
       let $holder = $(this).parents('.dropdown-menu');
        $holder.children().each(function () {
           $(this).removeClass('chosen');
        });
        $(this).addClass('chosen');

        let $wrapper = $holder.parents('.round-wrapper');

        $wrapper.find('.round-selected').text($(this).text());
        $wrapper.attr('data-checkstatus', 'checked');
    //     !!ajax to be added here that sends the checked round
        checkCategoryStatus($(this).parents('.category'));
    });

    //participants number
    $('.participants-in-round-input').on("change keyup input click", permitNumbersOnly);
    //    !!add a refresher of this handler each time the categories number changes
    //    !! for this .off('change keyup input click') snd again bind .on("change keyup input click", function() {....;

    $('.participants-in-round-input').blur(participantsInputBlur);
    //    !!add a refresher of this handler each time the categories number changes
    //    !! for this .off('blur') snd again bind .blur();


    //entrance number
    $('.entrance-number-input').on("change keyup input click", permitNumbersOnly
        //    !!add a refresher of this handler each time the categories number changes
        //    !! for this .off('change keyup input click') snd again bind .on("change keyup input click", function() {....;
    );

    $('.entrance-number-input').blur( participantsInputBlur
        //    !!add a refresher of this handler each time the categories number changes
        //    !! for this .off('blur') snd again bind .blur();
    );

    $b.on('click', '.show-dancers-btn', function () {
       $(this).toggleClass('shown');
        let $categoryHolder = $(this).parents('.category').find('.participants-holder');

        if ($(this).hasClass('shown')) {
        //    add ajax that shows participants
            $categoryHolder.slideDown();
        } else {


            $categoryHolder.slideUp().empty();
        }
    });





});
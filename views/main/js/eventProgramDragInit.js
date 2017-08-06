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
            $('.category-main-holder').myDrag('.draggable', 'just-hovered', 200);
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
            }
        );
        $(this).addClass('shown');
        function ajaxShowCategoriesAccordingToDep() {
            let id = $(this).attr('data-id-department');
            $.ajax({
                type: "POST",
                url: 'ajax_showCategoriesAccordingToDep',
                data: 'parameter=' + id,
                success: function (msg) {
                    $('#department-name').text($(this).text());
                },
                error: function (msg) {
                    console.log('ajax_showCategoriesAccordingToDep has failed to work!');
                }
            });
        }
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
    //   !! add function that checks whether all required parameters are checked
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
    $('.participants-in-round-input').on("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    //    !!add a refresher of this handler each time the categories number changes
    //    !! for this .off('change keyup input click') snd again bind .on("change keyup input click", function() {....;

    $('.participants-in-round-input').blur(function () {
        if ($(this).val() != '') {
            $(this).attr('data-checkstatus', 'checked');
        //    !! add ajax here
        } else {
            $(this).attr('data-checkstatus', 'unchecked');
        //    !! add ajax here
        }
        checkCategoryStatus($(this).parents('.category'));
    //    !!add a refresher of this handler each time the categories number changes
    //    !! for this .off('blur') snd again bind .blur();
    });

    //entrance number
    $('.entrance-number-input').on("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
        //    !!add a refresher of this handler each time the categories number changes
        //    !! for this .off('change keyup input click') snd again bind .on("change keyup input click", function() {....;

    });

    $('.entrance-number-input').blur(function () {
        if ($(this).val() != '') {
            $(this).attr('data-checkstatus', 'checked');
            //    !! add ajax here
        } else {
            $(this).attr('data-checkstatus', 'unchecked');
            //    !! add ajax here
        }
        checkCategoryStatus($(this).parents('.category'));
        //    !!add a refresher of this handler each time the categories number changes
        //    !! for this .off('blur') snd again bind .blur();
    });

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
jQuery(function($) {
    var $b = $('body'),
        $d = $(document);

    function setPosition() {
        let $categories = $('.category'),
            categoryIndex = 0,
            printIndex = 1;

        while (categoryIndex < $categories.length) {
            let self = $categories.eq(categoryIndex);

            self.find('.count-number').text(self.index()+1 + '.');

            if (self.attr('data-checkstatus') == 'completed') {
                self.find('.count-number-print').text(printIndex+'.');
                printIndex++;
            }
            categoryIndex++;
        }
    }
    function checkPositionCorrectness() {
        let $active = $('.category.active'),
            activeIndex = $active.index(),
            activeId = $active.attr('data-category').split('-')[0],
            activeRound = parseInt($active.attr('data-category').split('-')[1]);
        let $higherRound = $('[data-category="'+activeId+'-'+activeRound*2+'"'),
            higherIndex = $higherRound.index();
        let $lowerRound = $('[data-category="'+activeId+'-'+activeRound/2+'"'),
            lowerIndex = $lowerRound.index();

        // console.log(activeIndex, lowerIndex, higherIndex);

        if ((higherIndex < 0 && lowerIndex < 0) || (activeIndex > higherIndex && activeIndex < lowerIndex) || (higherIndex == -1 && activeIndex < lowerIndex) || (lowerIndex == -1 && activeIndex > higherIndex)) {
            // console.log('1if');
            return;
        } else if (activeIndex < higherIndex && (activeIndex < lowerIndex || lowerIndex == -1)) {
            $active.insertAfter($higherRound);
            // console.log('2if');
        } else if (activeIndex > lowerIndex) {
            $active.insertBefore($lowerRound);
            // console.log('3if');
        }
        setPosition();
    }
    function getNewCategoriesOrder() {
        let order = {},
            dep = parseInt($('#pick-department').find('.shown').attr('data-id-department')),
            $categories = $('.category');

        $categories.each(function () {
            order[parseInt($(this).index()+1)] = $(this).attr('data-category');
        });

        $.ajax({
            type: "POST",
            url: 'ajax_getNewCategoriesOrder',
            data: {'categories' : order, 'department_id' : dep},
            success: function (msg) {
                console.log(msg);
                console.log('ajax_getNewCategoriesOrder has worked successfully!');
            },
            error: function (msg) {
                console.log('ajax_getNewCategoriesOrder has failed to work!');
            }
        });

    }

    $d.on('mousedown', function (e) {
        $b.find('.active').each(function () {
            $(this).removeClass('active');
        });
        let $t = $(e.target),
            $li = $t.parents('.draggable');
        if ($li.length > 0) {$li.addClass('active');} else if ($t.hasClass('draggable')) {$t.addClass('active');}
    });

    $('.category-main-holder').myDrag('.draggable', 'just-hovered', 200, [setPosition, getNewCategoriesOrder], checkPositionCorrectness);

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
                checkPositionCorrectness();
                setPosition();
                if ($active.hasClass('category')) {
                    getNewCategoriesOrder();
                }
            }


        } else
            if (e.key == 'ArrowDown' && $active.length > 0) {

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
                checkPositionCorrectness();
                setPosition();
                if ($active.hasClass('category')) {
                    getNewCategoriesOrder();
                }
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
                data: {'id': id, 'print': true},
                success: function (msg) {
                    let categories = JSON.parse(msg);
                    console.log(categories);
                    let $mainHolder = $('.category-main-holder');
                    $mainHolder.empty();

                    let categoriesToPush = {};
                    categoriesToPush["length"] = categories.length;

                    for (let i = 0; i < categories.length; i++) {
                        let category = {};
                        category["category"] = categories[i]["d_c_program"] + ' ' + categories[i]["d_c_age_category"] + ' ' + categories[i]["d_c_nomination"] + ' ' + categories[i]["d_c_program"];
                        category["id"] = categories[i]["id"];
                        categoriesToPush[parseInt(categories[i]["sort_order"])] = category;
                    }

                    console.log(categoriesToPush);

                    for (let i = 1; i <= categoriesToPush["length"]; i++) {
                        $mainHolder.append('<li class="draggable category" data-id="'+ categoriesToPush[i]["id"] +'" data-checkstatus="unchecked">' +
                            '<div class="highlighter highlighterTop"></div>'+
                            '<div class="category-settings clearfix">'+
                            '<span class="count-number">'+ i +'.</span>'+
                            '<p class="category-name main-content">'+ categoriesToPush[i]["category"] +'</p>'+
                            '<span class="participants-number"><span class="the-participants-number">173</span>чел.</span>'+
                            '<div class="round-wrapper clearfix" data-checkstatus="unchecked">'+
                            '<span class="round-selected">ТУР</span>'+
                            '<div class="dropdown round-dropdown">'+
                            '<button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                            '<span class="caret"></span>'+
                            '</button>'+
                            '<  ul class="dropdown-menu flat" aria-labelledby="chooseRound">'+
                            '<li class="round-variant"><a>1/16</a></li>'+
                            '<li class="round-variant"><a>1/8</a></li>'+
                            '<li class="round-variant"><a>1/4</a></li>'+
                            '<li class="round-variant"><a>1/2</a></li>'+
                            '<li class="round-variant"><a>1/1</a></li>'+
                            '<li role="separator" class="divider"></li>'+
                            '<li class="new-round"><a>создать новое...</a></li>'+
                            '</ul>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="highlighter highlighterBot"></div>'+
                            '</li>');
                    }

                    $('#department-name').text($this.text());
                    $('#event-department').text($this.text());
                },
                error: function (msg) {
                    console.log('ajax_showCategoriesAccordingToDep has failed to work!');
                }
            });
        }
        ajaxShowCategoriesAccordingToDep($(this));
    });

    //print event
    $('#print-event').on('click', function () {
       window.print();
    });

    // round
    $b.on('click', '.new-round', function () {
        let $holder = $(this).parents('.dropdown-menu'),
            maxRound = parseInt($holder.children().eq(0).text().split('/')[1])*2;

        $holder.prepend('<li class="round-variant"><a>1/'+maxRound+'</a></li>');
    });

    $b.on('click', '.round-variant', function () {

        $(this).parents('.dropdown-menu').children().removeClass('chosen');
        $(this).addClass('chosen');

        let $wrapper = $(this).parents('.round-wrapper'),
            roundPicked = $(this).text();//round picked

        $wrapper.find('.round-selected').text(roundPicked);
        $wrapper.attr('data-checkstatus', 'checked');

        let $category = $wrapper.parents('.category');

        $category.attr('data-checkstatus','completed');
        roundPicked = parseInt(roundPicked.split('/')[1]);
        if (parseInt($category.attr('data-category').split('-')[1]) == 0) {
            //якщо ще не було попередньо обрано тур
            $category.attr('data-category', $category.attr('data-id')+'-'+roundPicked);

            let roundsToCreate = [],
                i = roundPicked/2;

            while (i >= 1) {
                roundsToCreate.push(i);
                i = i/2;
            }

            for (let i = roundsToCreate.length-1; i >= 0; i--) {
                $('<li class="draggable category" data-id="'+$category.attr('data-id')+'-'+roundsToCreate[i]+'" data-checkstatus="completed" data-category="'+$category.attr('data-id')+'-'+roundsToCreate[i]+'">'+
                    '<div class="highlighter highlighterTop"></div>'+
                    '<div class="category-settings clearfix">'+
                    '<span class="count-number" title="порядок"></span>'+
                    '<span class="count-number-print"></span>'+
                    '<div class="round-wrapper clearfix" title="выбор тура" data-checkstatus="checked">'+
                    '<span class="round-selected">1/'+roundsToCreate[i]+'</span>'+
                    '</div>'+
                    '<p class="category-name main-content" title="название категории">'+$category.find('.category-name').text()+'</p>'+
                    '</div>'+
                    '<div class="highlighter highlighterBot"></div>'+
                    '</li>').insertAfter($category);
            }

        } else {
            //якщо попередньо вже було обрано тур

            let ID = parseInt($category.attr('data-category').split('-')[0]),
                MAXROUND = parseInt($category.attr('data-category').split('-')[1]);

            if (roundPicked < MAXROUND) {
                $('.category').filter(function () {
                    return parseInt($(this).attr('data-category').split('-')[0]) == ID&&parseInt($(this).attr('data-category').split('-')[1]) >= roundPicked&&parseInt($(this).attr('data-category').split('-')[1]) < MAXROUND;
                }).remove();
                $category.attr('data-category', $category.attr('data-id')+'-'+roundPicked);
            } else if (roundPicked > MAXROUND) {

                let newRound = MAXROUND;

                while (newRound < roundPicked) {

                    $('<li class="draggable category" data-id="'+$category.attr('data-id')+'-'+newRound+'" data-checkstatus="completed" data-category="'+$category.attr('data-id')+'-'+newRound+'">'+
                        '<div class="highlighter highlighterTop"></div>'+
                        '<div class="category-settings clearfix">'+
                        '<span class="count-number" title="порядок"></span>'+
                        '<span class="count-number-print"></span>'+
                        '<div class="round-wrapper clearfix" title="выбор тура" data-checkstatus="checked">'+
                        '<span class="round-selected">1/'+newRound+'</span>'+
                        '</div>'+
                        '<p class="category-name main-content" title="название категории">'+$category.find('.category-name').text()+'</p>'+
                        '</div>'+
                        '<div class="highlighter highlighterBot"></div>'+
                        '</li>').insertAfter($category);

                    newRound = newRound * 2;
                    $category.attr('data-category', $category.attr('data-id')+'-'+roundPicked);
                }

            }

        }

        setPosition();
        
        //     !!ajax to be added here that sends the checked round
    });



});
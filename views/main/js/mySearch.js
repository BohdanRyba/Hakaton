
jQuery(function($) {
    jQuery.fn.mySearch = function (parentElem, childrenSelector, wrapperClass, textHolderSelector) {
        this.on('keyup', function () {
            const queryString = $(this).val().toLowerCase().match(/^\s*(.*)/)[1];
            // let $parentHolder = $('#department-categories-list');
            let $parentHolder = parentElem;

            function clearFragment(elem) {
                elem.find('.' + wrapperClass).each(function () {
                    let node = $(this)[0].childNodes[0];
                    node = $(node);
                    node.unwrap();
                });
            }

            if (queryString == '') {
                $parentHolder.find(childrenSelector).each(function () {
                    clearFragment($(this));
                    $(this).css('display', 'block');
                });
            } else {
                $parentHolder.find(childrenSelector).each(function () {

                    clearFragment($(this));

                    let text = $(this).find(textHolderSelector).text();

                    if (text.toLowerCase().includes(queryString)) {

                        //<highlight searched fragment>
                        let $textHolder = $(this).find(textHolderSelector);

                        let parse = $textHolder.html().match(/(.*)/),
                            text = parse[1],
                            regexp = new RegExp(queryString, 'i'),
                            regexpGlobal = new RegExp(queryString, 'gi'),
                            coincidences = text.match(regexpGlobal).length,
                            categoryFragments = [];

                        for (let i = 0; i < coincidences; i++) {
                            let thisCoincidence;

                            if (i == 0) {
                                thisCoincidence = text.match(regexp)[0];
                                let coincidenceLength = thisCoincidence.length,
                                    pos = text.indexOf(thisCoincidence);
                                categoryFragments.push(text.slice(0, pos));
                                thisCoincidence = '<span class="' + wrapperClass + '">' + thisCoincidence + '</span>';
                                categoryFragments.push(thisCoincidence);
                                categoryFragments.push(text.slice(pos + coincidenceLength));
                            } else {
                                let str = categoryFragments[categoryFragments.length - 1];
                                thisCoincidence = str.match(regexp)[0];
                                let coincidenceLength = thisCoincidence.length,
                                    pos = categoryFragments[categoryFragments.length - 1].indexOf(thisCoincidence);
                                categoryFragments[categoryFragments.length - 1] = str.slice(0, pos);
                                thisCoincidence = '<span class="' + wrapperClass + '">' + thisCoincidence + '</span>';
                                categoryFragments.push(thisCoincidence);
                                categoryFragments.push(str.slice(pos + coincidenceLength));
                            }
                        }
                        text = categoryFragments.join('');
                        $textHolder.html(text);
                        //</highlight searched fragment>

                        $(this).css('display', 'block');

                    } else {
                        $(this).css('display', 'none');
                        clearFragment($(this));
                    }
                });
            }
        });
    };
});
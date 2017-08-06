jQuery(function($) {

    jQuery.fn.myDrag = function (dragedSelector, hoveredClass, timeSuspension, successDropFunc) {

        let holder = this[0];
        // console.log(holder);
        //     console.log(e.target);
            // functions set
            function getCoord(element) {
                let clientCoords = element.getBoundingClientRect();

                return {
                    top: clientCoords.top + pageYOffset,
                    left: clientCoords.left + pageXOffset
                }
            }

            var draggedObj = {};

            document.onmousedown = function (e) {
                if (e.which != 1) {
                    return;
                }
                draggedObj.elem = e.target.closest(dragedSelector);
                draggedObj.clickX = e.pageX;
                draggedObj.clickY = e.pageY;
            };

            //functions for mouse move event
            function createAvatar(elem) {
                var original = elem.getElementsByClassName('main-content')[0];
                var avatar = original.cloneNode(true);
                avatar.style.pointerEvents = 'none';
                draggedObj.avatarHeight = elem.getBoundingClientRect().height;
                draggedObj.avatarWidth = elem.getBoundingClientRect().width;

                var old = {
                    left : elem.getBoundingClientRect().left + pageXOffset || '',
                    top : elem.getBoundingClientRect().top + pageYOffset || ''
                };

                avatar.style.width = original.getBoundingClientRect().width + 'px';
                avatar.style.height = original.getBoundingClientRect().height + 'px';
                avatar.rollback = function () {
                    avatar.style.left = old.left + 'px';
                    avatar.style.top = old.top + 'px';
                };

                return avatar;
            }


            function dragStart() {
                draggedObj.elem.classList.add('dragged');
                var avatar = draggedObj.avatar;

                document.body.appendChild(avatar);
                avatar.style.zIndex = 9999;
                avatar.style.position = 'absolute';
            }
            function highlightTop(hovered) {
                if (draggedObj.hovered.prevSibling != draggedObj.elem) {
                    draggedObj.lowerHighlightElem = hovered;
                } else {
                    draggedObj.lowerHighlightElem = null;
                }

                if (draggedObj.hovered.prevSibling && draggedObj.hovered.prevSibling != draggedObj.elem) {
                    draggedObj.higherHighlightElem = draggedObj.hovered.prevSibling;
                } else {
                    draggedObj.higherHighlightElem = null;
                }
            }
            function highlightBot(hovered) {
                if (draggedObj.hovered.nextSibling != draggedObj.elem) {
                    draggedObj.higherHighlightElem = hovered;
                } else {
                    draggedObj.higherHighlightElem = null;
                }

                if (draggedObj.hovered.nextSibling && draggedObj.hovered.nextSibling != draggedObj.elem) {
                    draggedObj.lowerHighlightElem = draggedObj.hovered.nextSibling;
                } else {
                    draggedObj.lowerHighlightElem = null;
                }
            }
            function clearHighlightClasses() {
                var up = holder.getElementsByClassName('up');
                if (up && up.length>0) {
                    for (let i=0; i<up.length; i++) {
                        up[i].classList.remove('up');
                    }
                }
                var down = holder.getElementsByClassName('down');
                if (down && down.length>0) {
                    for (let i=0; i<down.length; i++) {
                        down[i].classList.remove('down');
                    }
                }
                // var highlights = document.getElementsByClassName('highlighter');
                // if (highlights && highlights.length>0) {
                //         for (let i=0; i<highlights.length; i++) {
                //             highlights[i].remove();
                //         }
                //     }
            }
            function onHoveredEnter(e, hovered) {
                if (hovered) {
                    draggedObj.hovered.nextSibling = hovered.nextElementSibling;
                    draggedObj.hovered.prevSibling = hovered.previousElementSibling;

                    hovered.classList.add(hoveredClass);

                    var bounds = hovered.getBoundingClientRect();
                    var relY = (e.clientY - bounds.top) / bounds.height;

                    if (0 <= relY && relY <= 0.45) {
                        highlightTop(hovered);
                    }
                    else if (0.55 <= relY && relY <= 1) {
                        highlightBot(hovered);
                    }
                }
            }
            function onHoveredMove(e, hovered) {
                if (hovered) {
                    var bounds = hovered.getBoundingClientRect();
                    var relY = (e.clientY - bounds.top) / bounds.height;

                    if (0 <= relY && relY <= 0.45) {
                        highlightTop(hovered);
                    } else if (0.45 < relY && relY < 0.55) {
                        draggedObj.higherHighlightElem = null;
                        draggedObj.lowerHighlightElem = null;
                        clearHighlightClasses();
                    } else if (0.55 <= relY && relY <= 1) {
                        highlightBot(hovered);
                    }
                }
            }
            function onHoveredLeave(e, hovered) {
                var justHovered = holder.getElementsByClassName(hoveredClass);
                if (justHovered && justHovered.length>0) {
                    for (let i=0; i<justHovered.length; i++) {
                        justHovered[i].classList.remove(hoveredClass);
                    }
                }
                draggedObj.higherHighlightElem = null;
                draggedObj.lowerHighlightElem = null;
                clearHighlightClasses();
            }

            //    mousemove event
            document.onmousemove = function (e) {
                if (!draggedObj.elem) return;

                if (!draggedObj.avatar) {
                    var moveX = e.pageX - draggedObj.clickX;
                    var moveY = e.pageY - draggedObj.clickY;
                    if (Math.abs(moveY) < 4 && Math.abs(moveX) < 4) {return;}


                    draggedObj.avatar = createAvatar(draggedObj.elem);
                    if (!draggedObj.avatar) {
                        draggedObj={};
                        return;
                    }

                    var avatarCoords = getCoord(draggedObj.elem);

                    draggedObj.shiftX = (draggedObj.clickX - avatarCoords.left)/draggedObj.avatarWidth;
                    draggedObj.shiftY = (draggedObj.clickY - avatarCoords.top)/draggedObj.avatarHeight;

                    dragStart();

                    draggedObj.avatar.classList.add('avatar');
                }

                clearTimeout(draggedObj.timerId);
                draggedObj.avatar.style.left = e.pageX - draggedObj.shiftX*parseInt(draggedObj.avatar.style.width) + 'px';
                draggedObj.avatar.style.top = e.pageY - draggedObj.shiftY*parseInt(draggedObj.avatar.style.height) + 'px';

                //find hovered element
                var hovered = document.elementFromPoint(e.clientX, e.clientY);
                if (hovered) {// if hovered != null
                    hovered = hovered.closest(dragedSelector);

                    if (hovered && !hovered.classList.contains('dragged')) { //check whether hovered element exists and is not the dragged element
                        //if there is no hovered element or draggedObj==null
                        if (!draggedObj.hovered) {
                            draggedObj.hovered = {};
                            draggedObj.hovered.hoveredId = hovered.getAttribute('data-id');
                            onHoveredEnter(e, hovered);
                        }
                        //check whether hovered element is the same or has changed
                        if (draggedObj.hovered.hoveredId == hovered.getAttribute('data-id')) {
                            onHoveredMove(e, hovered);
                        }
                        if (hovered.getAttribute('data-id')!= draggedObj.hovered.hoveredId) {
                            onHoveredLeave(e, hovered);
                            draggedObj.hovered.hoveredId = hovered.getAttribute('data-id');
                            onHoveredEnter(e, hovered);
                        }
                    } else if (hovered && hovered.classList.contains('dragged')) {
                        //    найти елемент з класами для підсвітки і забрати класи
                        onHoveredLeave(e,hovered);
                        draggedObj.hovered = {};
                        draggedObj.hovered.hoveredId = hovered.getAttribute('data-id');
                        draggedObj.hovered.nextSibling = hovered.nextElementSibling;
                        draggedObj.hovered.prevSibling = hovered.previousElementSibling;
                    } else {
                        draggedObj.hovered = null;
                        onHoveredLeave(e, hovered);
                    }
                }

                draggedObj.timerId = setTimeout(function () {
                        if (draggedObj.higherHighlightElem) {
                            let highlighterBot = draggedObj.higherHighlightElem.getElementsByClassName('highlighterBot')[0];
                            let boxHeight = 0.45*(highlighterBot.parentElement.getBoundingClientRect().height);
                            highlighterBot.style.height = boxHeight + 'px';
                            highlighterBot.classList.add('down');
                            // let highlighterBot = document.createElement('div');
                            // let boxHeight = 0.45*(draggedObj.higherHighlightElem.getBoundingClientRect().height);
                            // highlighterBot.classList.add('highlighter', 'highlighterBot');
                            // highlighterBot.style.height = boxHeight + 'px';
                            // draggedObj.higherHighlightElem.appendChild(highlighterBot);
                            // highlighterBot.classList.add('down');
                        }
                        if (draggedObj.lowerHighlightElem) {
                            let highlighterTop = draggedObj.lowerHighlightElem.getElementsByClassName('highlighterTop')[0];
                            let boxHeight = 0.45*(highlighterTop.parentElement.getBoundingClientRect().height);
                            highlighterTop.style.height = boxHeight + 'px';
                            highlighterTop.classList.add('up');
                            // let highlighterTop = document.createElement('div');
                            // let boxHeight = 0.45*(draggedObj.lowerHighlightElem.getBoundingClientRect().height);
                            // highlighterTop.classList.add('highlighter', 'highlighterTop');
                            // highlighterTop.style.height = boxHeight + 'px';
                            // draggedObj.lowerHighlightElem.appendChild(highlighterTop);
                            // highlighterTop.classList.add('up');
                        }

                }, timeSuspension);
            };

            //    mouseup functions
            function findDropable(e) {
                draggedObj.avatar.hidden = true;

                var elem = document.elementFromPoint(e.clientX, e.clientY);

                draggedObj.avatar.hidden = false;
                if (elem == null) {
                    return null;
                }

                var lowerElem = draggedObj.elem.parentNode.getElementsByClassName('up');
                var higherElem = draggedObj.elem.parentNode.getElementsByClassName('down');
                if (lowerElem.length > 1 || higherElem.length > 1) {return false;}

                if (lowerElem.length > 0 && higherElem.length >= 0) {
                    return {insertBefore : lowerElem[0].closest(dragedSelector)};
                } else if (lowerElem.length == 0 && higherElem.length > 0) {
                    return {append : higherElem[0].closest(dragedSelector)};
                } else {
                    return false;
                }
            }
            function dragFinish(e) {
                var dropable = findDropable(e);

                if (dropable) {
                    //success
                    document.body.removeChild(draggedObj.avatar);
                    holder.removeChild(draggedObj.elem);
                    if (dropable.insertBefore) {
                        holder.insertBefore(draggedObj.elem, dropable.insertBefore);
                    } else {
                        holder.append(draggedObj.elem);
                    }
                } else {
                    // failure
                    document.body.removeChild(draggedObj.avatar);
                }
            }

            document.onmouseup = function (e) {
                if (draggedObj.avatar) {
                    dragFinish(e);
                }
                onHoveredLeave();
                var dragged = holder.getElementsByClassName('dragged');
                if (dragged && dragged.length>0) {
                    for (let i=0; i<dragged.length; i++) {
                        dragged[i].classList.remove('dragged');
                    }
                }
                // console.log(document.getElementsByClassName('highlighter'));
                // clearHighlightClasses();
                draggedObj = {};
                if (successDropFunc) {
                    successDropFunc();
                }
            }
    }
});
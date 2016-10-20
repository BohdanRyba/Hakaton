function funcBefore(){
  $('.content-in').css('height','200px');
  $('body').css('cursor','progress');
  var opts = {
    lines: 13, // Число линий для рисования
    length: 4, // Длина каждой линии
    width: 5, // Толщина линии
    radius: 20, // Радиус внутреннего круга
    corners: 1, // Скругление углов (0..1)
    rotate: 0, // Смещение вращения
    direction: 1, // 1: по часовой стрелке, -1: против часовой стрелки
    color: '#00c0ef', // #rgb или #rrggbb или массив цветов
    speed: 2.0, // Кругов в секунду
    trail: 17, // Послесвечение
    shadow: false, // Тень(true - да; false - нет)
    hwaccel: false, // Аппаратное ускорение
    className: 'spinner', // CSS класс
    zIndex: 2e9, // z-index (по-умолчанию 2000000000)
    top: '60%', // Положение сверху относительно родителя
    left: '50%' // Положение слева относительно родителя
  };
  var target = document.getElementById('loading');
  var spinner = new Spinner(opts).spin(target);
}
function funcSuccess(data){
  console.log(data);
  $('body').css('cursor','default');
  $('#loading>').remove();
  $('#loading').css('height','0px')
  $('.content-in').css('height','0');
  $('.cont-box1').append(data);
  $('body').trigger('mask_ajax');
}
$(function(){
  $('.btn-plus-event').on('click', function (){
    $('.cont-box1>').remove();
    $.ajax({
      url:'create-event.php',
      type:'POST',
      dataType:'html',
      beforeSend:funcBefore,
      success: funcSuccess
    });
  });
  $('.btn-plus-category').on('click', function (){
    $('.cont-box1>').remove();
    $.ajax({
      url:'create-category.php',
      type:'POST',
      dataType:'html',
      beforeSend:funcBefore,
      success: funcSuccess
    });
  });
  $('.btn-plus-club').on('click', function (){
    $('.cont-box1>').remove();
    $.ajax({
      url:'create-club.php',
      type:'POST',
      dataType:'html',
      beforeSend:funcBefore,
      success: funcSuccess
    });
  });

  $('.list-search').on('click', function(){
    $('.cont-box1>').remove();
    $.ajax({
      url:'club-cubinet-for-adm.php',
      type:'POST',
      data:({}),
      dataType:'html',
      beforeSend: funcBefore,
      success: funcSuccess
    });
  });
});
$(function(){
  var $slider=$('.slider').children('div');
  var $next=$(".next");
  var $prev=$('.prev');

  $slider.each(function () {
    $(this).children().not(':first').hide();
    $(this).children().filter(':first').show().addClass('active');
  });
  function goSlide() {
    var currentSlide = $slider.children('.active');
    var nextSlide = currentSlide.next();
    if(nextSlide.length === 0) {
      nextSlide = $('#circle').children('.go').first();
    }
    currentSlide.toggle("slide").removeClass('active');
    nextSlide.toggle("slide").addClass('active');
  }

  function backSlide() {
    var currentSlide = $slider.children('.active');
    var prevSlide = currentSlide.prev();
    if(prevSlide.length === 0) {
      prevSlide = $('#circle').children('.go').last();
    }
    currentSlide.toggle("slide").removeClass('active');
    prevSlide.toggle("slide").addClass('active');
  }
  $next.on('click',goSlide);
  $prev.on('click',backSlide);


  //gereb and razult data
  $('#jereb_run').on('click',function(){
    var kilcPar=$('.one_team li');
    var numReserve = [];
    while (numReserve.length < kilcPar.length) {
     var randomNumber = Math.ceil(Math.random() * kilcPar.length);
     var found = false;
     for (var i = 0; i < numReserve.length; i++) {
      if (numReserve[i] === randomNumber){
       found = true;
       break;
     }
   }
   if (!found) { numReserve[numReserve.length]=randomNumber; }
 }
 console.table(numReserve);
 var masTwo=[0];
 $('.two_team li').each(function(i){
   masTwo[i+1]= $(this).html();
 });
 console.table(masTwo);

 var masRand=[];
 for(i=0;i<kilcPar.length;i++){
  let a=numReserve[i];
  masRand[i]=masTwo[a];
}
console.table(masRand);
kilcPar.each(function(i){
 $(this).append(' - '+masRand[i])
});
$('.two_team').empty();

$(this).text('Показать результаты');
$('.cenu ul').css('display','inline-block');
$('#jereb_run').off('click');

      //final 10 6
      $('#jereb_run').click(function () {
       var participantsInfo={},
       participantsPoints=[],
       participantsWinnersNames=[],
       $participants=$('div.participants'),
       $points=$('ul.participants_points'),
       $winnersList=$('div.the_final_6');

       for (var i=0; i<$participants.children().length; i++) {
        participantsInfo[$participants.children().eq(i).children().eq(0).html()]=$points.children().eq(i).children()[0].value;
      }

      for (var key in participantsInfo) {
        participantsPoints.push(+participantsInfo[key])
      }

      participantsPoints.sort(function(a,b){return a-b;}).reverse()
      console.log(participantsPoints)

      addingWinnersProcess:
      for (var i=0; i<6; i++) {
        for (var key in participantsInfo) {
         if (participantsPoints[i]==participantsInfo[key]) {
          participantsWinnersNames.push(key);
          delete participantsInfo[key];
          if (participantsWinnersNames.length==6) {
           break addingWinnersProcess;
         }
       }
     }
   }

   console.log(participantsWinnersNames)

   for (var i=0; i<$winnersList.children(0).eq(0).children().length-1; i++) {
    $winnersList.children().eq(0).children().eq(i).html(participantsWinnersNames[i]+'. Пара набрала: '+participantsPoints[i]+' балов')
  }

  $winnersList.css("display", "block")

  $('#the_final_6_close').click(function () {
    $winnersList.css("display", "none")
  })
})
    });
});
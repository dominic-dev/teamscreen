/* @author Dominic */
const FRAMES_PER_SECOND = 20;
const FRAME_PAUSE_TIME_IN_MS = 5000;

$(document).ready(function(){
    // Cache drinkList
    var drinkList = $('#drink-list');

    // Calculate distance to scroll
    var scrollDistance = drinkList[0].scrollHeight - drinkList.height();

    // Set timer
    window.setInterval(function(){
        var target = drinkList.scrollTop() == 0 ? scrollDistance : 0;
        drinkList.animate({scrollTop : target}, 1000);
    }, FRAME_PAUSE_TIME_IN_MS);

});
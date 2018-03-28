

/**
 * Animate the list if the list is longer than the defined widget height.
 * @type {HTMLElement | null}
 */
var drinklist = document.getElementById('drink-list');
var FRAMES_PER_SECOND = 20;
var FRAME_PAUSE_TIME_IN_MS = 5000;

/**
 * Pauses widget frame when it reaches bottom and top of the frame.
 * @param milliseconds
 */
function sleep(milliseconds) {
    var currentTime = new Date().getTime();
    while (currentTime + milliseconds >= new Date().getTime()) {
    }
}
function step() {
    console.log(drinklist.scrollTop + 2);
    console.log((drinklist.scrollHeight - drinklist.offsetHeight));
    if (drinklist.scrollTop <= 0) {
        direction = 1;
        sleep(FRAME_PAUSE_TIME_IN_MS);
    } else if (drinklist.scrollTop + 2 > ((drinklist.scrollHeight - drinklist.offsetHeight))) {
        direction = -1;
        sleep(FRAME_PAUSE_TIME_IN_MS);
    }
    drinklist.scrollTop += direction;
    setTimeout(function () {
        window.requestAnimationFrame(step);
    }, 1000 / FRAMES_PER_SECOND);
}
window.requestAnimationFrame(step);
var updates = document.querySelector('.home-themes-inner');

if (updates) {
  var body = document.querySelector('body');
  var curYPos, curXPos, curDown, dragging = false;

  updates.addEventListener('mousemove', function(e) {

    if (curDown) {
      dragging = true;
      //curXPos is where the click begins
      updates.scrollLeft = curLeft - 1.35 * (e.pageX - curXPos);

    }
  });

  updates.addEventListener('mousedown', function(e) {
    curXPos = e.pageX;
    curDown = true;
    curLeft = updates.scrollLeft;
    dragging = false;
    updates.classList.add('grabbing');
  });

  updates.addEventListener('mouseup', function(e) {
    curDown = false;
    updates.classList.remove('grabbing');
  });

  updates.addEventListener('mouseleave', function(e) {
    curDown = false;
    updates.classList.remove('grabbing');
  });


}


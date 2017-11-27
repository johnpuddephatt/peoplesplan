var scrollers = document.querySelectorAll('.scroller-outer');

for (var i = 0; i < scrollers.length; i++) {

  let scrollerInner = scrollers[i].querySelector('.scroller-inner');
  let nextButton = scrollers[i].querySelector('.scroller-next');
  let prevButton = scrollers[i].querySelector('.scroller-previous');

  function themeScroll(direction) {
    let dir = 1;
    if(direction == 'backwards') {
      dir = -1;
    }
    let newScroll = scrollerInner.scrollLeft - scrollerInner.clientWidth * .5 * dir;
    smoothScroll(newScroll,500,null,scrollerInner,'horizontal');
  }



  if(scrollerInner) {
    var body = document.querySelector('body');
    var curYPos, curXPos, curDown, dragging = false;

    scrollerInner.addEventListener('scroll', function(e) {
      if ((this.scrollWidth - this.clientWidth - this.scrollLeft) === 0) {
        nextButton.setAttribute('tabindex', '-1');
        prevButton.removeAttribute('tabindex');
      }
      else if (this.scrollLeft == 0) {
        prevButton.setAttribute('tabindex', '-1');
        nextButton.removeAttribute('tabindex');
      }
      else {
        nextButton.removeAttribute('tabindex');
        prevButton.removeAttribute('tabindex');
      }
    });


    scrollerInner.addEventListener('mousemove', function(e) {

      if (curDown) {
        dragging = true;
        //curXPos is where the click begins
        scrollerInner.scrollLeft = curLeft - 1.35 * (e.pageX - curXPos);

      }
    });


    scrollerInner.addEventListener('mousedown', function(e) {
      curXPos = e.pageX;
      curDown = true;
      curLeft = scrollerInner.scrollLeft;
      dragging = false;
      scrollerInner.classList.add('grabbing');
    });

    scrollerInner.addEventListener('mouseup', function(e) {
      curDown = false;
      scrollerInner.classList.remove('grabbing');
    });

    scrollerInner.addEventListener('mouseleave', function(e) {
      curDown = false;
      scrollerInner.classList.remove('grabbing');
    });



    nextButton.addEventListener('click', ()=> {
      themeScroll('backwards');
    });

    prevButton.addEventListener('click', ()=>{
      themeScroll();
    });

  }


}
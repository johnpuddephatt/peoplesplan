@extends('layouts.app')

@section('content')
  <section class="section--home-header">
    <div class="container">
      <div class="header-introduction">
        <h1 class="page-title page-title--home">Let’s plan the most advanced digital society in the world &ndash; together</h1>
        {{-- <p>As Parliament debates how to make the United Kingdom the world’s digital leader, it’s important we end up with the right plan.</p >
        <p>That’s why we’ve created the People’s Plan for Digital, a place where anyone – including you – can suggest and discuss the ideas you think Parliament should listen to.</p> --}}
        <p>Politicians are debating how to make the United Kingdom the world’s digital leader, so we’ve created a place where you can suggest and discuss the ideas you think Parliament should listen to.</p>
        <a class="button" href="#">View the ideas</a><a class="button primary" href="#">Add your idea</a>

      </div>
      <div class="header-image">
        @include('inc.homepage-header')
      </div>
    </div>
  </section>

{{--
  <section class="section--home-introduction">
    <div class="container">

    </div>
  </section> --}}

  <section class="section--home-stages">
    <div class="container">


      <h3 class="section-title">We want to create the best plan in the world.<br />That means finding the best ideas in the world.</h3>
      <p class="section-subtitle">Planning the most advanced digital society in the world involves three steps.</p>
      <div class="stages-container">
        <div class="stage-column">
          <img src="images/icon-suggest.svg" alt="">
          <h3>Suggest</h3>
          <p>Put forward your ideas or debate ideas others have proposed</p>
        </div>
        <div class="stage-column">
          <img src="images/icon-debate.svg" alt="">
          <h3>Improve</h3>
          <p>Review the draft plans which will be created based on your suggestions</p>
        </div>
        <div class="stage-column">
          <img src="images/icon-improve.svg" alt="">
          <h3>Launch</h3>
          <p>See the plan presented in Parliament to help shape national policy</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section--home-themes">
    <div class="container">
      <h3 class="section-title">Themes</h3>
      <p class="section-subtitle">The online debate will focus on a different topic each month.</p>

      <div class="home-themes-scroller scroller-outer">
        <div class="scroller-navigation"><button class="scroller-previous hidden">Previous</button><button class="scroller-next">Next</button></div>
        <ul class="home-themes-inner scroller-inner">
          <li class="home-theme-item home-theme-item--safety">
            <h4 class="home-theme-title">Safety</h4>
            <div class="home-theme-date">January</div>
            <p>How do we create online spaces that ensure the safety of users, especially children? And how do we build online trust through strong data protection and proper content regulation?</p></li>
          <li class="home-theme-item home-theme-item--infrastructure">
            <h4 class="home-theme-title">Infrastructure</h4>
            <div class="home-theme-date">February</div>
            <p>How do we provide world-leading connectivity so that data moves quickly, cheaply and securely? And how do we ensure competitive online services for people and businesses?</p></li>
          <li class="home-theme-item home-theme-item--skills">
            <h4 class="home-theme-title">Skills &amp; enterprise</h4>
            <div class="home-theme-date">March</div>
            <p>How do we ensure everyone has the basic digital skills they need to participate in online life? And how do we reach train sufficient levels of <abbr title="Information and Communications Technology">ICT</abbr> professionals and <abbr title="Science, Technology, Engineering & Maths">STEM</abbr> graduates?</p></li>
          <li class="home-theme-item home-theme-item--security">
            <h4 class="home-theme-title">Cybersecurity</h4>
            <div class="home-theme-date">April</div>
            <p>How can we keep our country, citizens and devices safe online? And how can the UK lead in the provision and uptake of safe, secure electronic payment options?</p></li>
          <li class="home-theme-item home-theme-item--jobs">
            <h4 class="home-theme-title">Jobs for the future</h4>
            <div class="home-theme-date">May</div>
            <p>How do create new jobs by attracting world-leading innovators, nurturing new technology startups and being at the forefront of technology research and development?</p></li>
          <li class="home-theme-item home-theme-item--government">
            <h4 class="home-theme-title">Government &amp; democracy</h4>
            <div class="home-theme-date">June</div>
            <p>How can the government deliver great services online in areas like education and health? And how can digital tools get more people involved in debates and decision-making?</p></li>
        </ul>
      </div>
    </div>
  </section>


  <section class="section--home-interviews">
    <div class="container">
      <h3 class="section-title">Interviews</h3>
      <p class="section-subtitle">The online debate will focus on a different topic each month.</p>


      <div class="home-interviews-scroller scroller-outer">
        <div class="scroller-navigation"><button class="scroller-previous hidden">Previous</button><button class="scroller-next">Next</button></div>
        <div class="home-interviews-inner scroller-inner">
          <a href="#" class="home-interviews-item">
            <div class="home-interviews-image">
              <img  src="/images/example-video-still.jpg" alt="">
              @include("inc.playbutton")
            </div>
            <p class="home-interviews-quote">We are in need of a digital skills revolution</p>
            <h4 class="home-interviews-title">Martha Lane Fox</h4>
          </a>
          <a href="#" class="home-interviews-item">
            <div class="home-interviews-image">
              <img  src="/images/example-video-still.jpg" alt="">
              @include("inc.playbutton")
            </div>
            <p class="home-interviews-quote">We’re desperately in need of a digital skills revolution</p>
            <h4 class="home-interviews-title">Martha Lane Fox</h4>
          </a>
          <a href="#" class="home-interviews-item">
            <div class="home-interviews-image">
              <img  src="/images/example-video-still.jpg" alt="">
              @include("inc.playbutton")
            </div>
            <p class="home-interviews-quote">Digital provides a huge opportunity to fix our productivity problem</p>
            <h4 class="home-interviews-title">Martha Lane Fox</h4>
          </a>
          <a href="#" class="home-interviews-item">
            <div class="home-interviews-image">
              <img  src="/images/example-video-still.jpg" alt="">
              @include("inc.playbutton")
            </div>
            <p class="home-interviews-quote">We are in need of a digital skills revolution</p>
            <h4 class="home-interviews-title">Martha Lane Fox</h4>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="section--home-quote">
    <div class="container">
      <div class="home-quote--text">
        <h3 class="quote-body">“we want to use digital tools to help Parliament draw on the best ideas to get the UK’s digital policy right”</h3>
        <p class="quote-attribute">Liam Byrne MP, Shadow Digital Minister.</p>
      </div>
      <div class="home-quote--megaphone">
        <img src="images/megaphone.svg" alt="Megaphone illustration">
      </div>


    </div>
  </section>

  <section class="section--home-questions">
    <div class="container">
      <h3 class="section-title">Questions and answers</h3>
      <div class="tabs">
        <div class="tab">
          <input checked="checked" name="tab-group-1" id="tab-1" type="radio">
          <label for="tab-1">What is the People’s Plan?</label>
          <div class="content">
            <p>In 2015, the Digital Democracy Commission set an ambitious goal: to make Parliament, ‘fully interactive and digital’ by 2020, using new technologies to involve the public in Parliamentary debates and drafting new laws.</p>
            <p>This site aims to help. We hope to hasten digital democracy by pioneering new technologies to help Parliament get the United Kingdom’s policy for digital technology right.</p>
            <p>Created by Liam Byrne MP, Shadow Digital Minister, our ambition is to help all members of government listen to and consult with citizens, business and trade unions as we share and debate ideas for the United Kingdom’s digital future.</p>

            <!-- <p>We want to gather together the ideas and advice to help Parliament create the best possible plan to help the United Kingdom become the most advanced digital society in the world. And we want to use digital tools to help. It's a collaborative policy process that’s both transparent and easy to participate in.</p> -->
          </div>
        </div>
        <div class="tab">
          <input name="tab-group-1" id="tab-2" type="radio">
          <label for="tab-2">Why are you doing this?</label>
          <div class="content">
            <p>In 2015, Mr Speaker created a <a href="http://www.digitaldemocracy.parliament.uk/chapter/summary#main-content">Digital Democracy Commission</a>, to ‘to consider the challenges and opportunities for our democracy that digital technology presents’. It advised that Parliament should aim to become ‘fully interactive and digital’ by 2020. Around the world, parliaments, city governments, and political parties are stepping up the use of <a href="http://www.nesta.org.uk/event/how-can-digital-technology-strengthen-our-democracy">digital technology to help get plans and policies right</a>.</p>
            <p>We don’t want to be left behind. So we want to use some tried and tested techniques for using digital tools - to help Parliament debate and perfect, policy for a more digital United Kingdom. We won't just use digital tools - we'll also be running a host of events - but we know digital tools can help a lot.</p>
          </div>
        </div>
        <div class="tab">
          <input name="tab-group-1" id="tab-3" type="radio">
          <label for="tab-3">Will it make a difference?</label>
            <div class="content">

            <p>The People's Plan for Digital will help Parliament connect to the best ideas in the United Kingdom, and around the world, as it debates some of the most important questions for the future of our country.</p>
          </div>
        </div>
        <img class="tab-image" src="/images/digitalglobe.svg" alt="">

      </div>
    </div>
    {{-- <ul class="container">
      @foreach ($articles as $article)
        <li><a href="/blog/{{ $article->slug }}">{{$article->title}}</a></li>
      @endforeach
    </ul> --}}
  </section>




  <section class="section--home-quote">
    <div class="container">
      <div class="home-quote--text">
        <h3 class="quote-body">“We believe the public want the opportunity to have their say in House of Commons debates; we also believe that this will provide a useful resource for MPs and help to enhance those debates.”</h3>
        <p class="quote-attribute">Speaker’s Digital Democracy Commission, 2015</p>
      </div>
      <div class="home-quote--clock">
        <img src="images/westminster.svg" alt="Clock tower at Palace of Westminster">
      </div>
    </div>
  </section>
@stop
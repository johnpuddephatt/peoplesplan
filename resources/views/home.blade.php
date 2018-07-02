@extends('layouts.app')

@section('content')
  <section class="section--home-header">
    <div class="container container--home-header">
      <div class="header-introduction">
        <h1 class="page-title page-title--home">Let’s design the most advanced digital society in the world &ndash; together</h1>
        <p>Our country is debating how to become the world’s digital leader. So we’ve created a place where you can share and shape the ideas you want Parliament to listen to.</p>
        <a class="button" href="/ideas/">See all ideas</a><a class="button primary" href="/ideas/add/">Add your idea</a>
      </div>
      <div class="header-image">
        @include('inc.homepage-header')
      </div>
    </div>
    @if($latestinterview && $latestarticle)

        <div class="container container--home-featured">
          <div>
            <h2 class="featured-heading">Latest viewpoint</h2>
            @include('interview.card',['interview'=> $latestinterview])
          </div>
          <div>
            <h2 class="featured-heading">Latest article</h2>
            @include('article.card',['article'=> $latestarticle,'withImage'=>true])
          </div>
        </div>

    @endif
  </section>






{{-- @if ($popularideas->count())
  <section class="section--home-featured">
    <div class="container">
      <h2 class="section-title">Popular ideas</h2>
      <p class="section-subtitle">See the ideas currently generating discussion</p>
      <div class="home-featured-scroller scroller-outer">
        <div class="scroller-navigation"><button class="scroller-previous" tabindex="-1">Previous</button><button class="scroller-next">Next</button></div>
        <div class="home-interviews-inner scroller-inner">
          @foreach ($popularideas as $idea)
            @include('idea.card')
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endif --}}

@if ($popularideas->count())
  <section class="section--home-popular">
    <div class="container">
      <h2 class="section-title">Popular ideas</h2>
      <p class="section-subtitle">See the ideas currently generating discussion</p>
      <div class="card-list">
        @foreach ($popularideas as $idea)
          @include('idea.card')
        @endforeach
      </div>
    </div>
  </section>
@endif

<section class="section--home-themes">
  <div class="container">
    <h2 class="section-title">Themes</h2>
    <p class="section-subtitle">The online debate will focus on a different topic each month.</p>
    <div class="home-themes-scroller scroller-outer">
      <div class="scroller-navigation"><button class="scroller-previous" tabindex="-1">Previous</button><button class="scroller-next">Next</button></div>
      <ul class="home-themes-inner scroller-inner">
        @foreach ($themes as $theme)
          <li class="home-theme-item home-theme-item--{{ str_slug($theme->title) }}">
            <h3 class="home-theme-title">
              {{ $theme->title }}
            </h3>
            <img src="{{$theme->icon}}" class="home-theme-icon" alt="">
            {{--<div class="home-theme-date">
              {{$theme->getMonth()}}
            </div>--}}
            <p>{{ $theme->description }}</p>
            <a href="/themes/{{str_slug($theme->title)}}" class="button">Join the debate</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>

  {{--
      @if ($interviews->count())
        <section class="section--home-interviews">
          <div class="container">
            <h2 class="section-title">Viewpoints</h2>
            <p class="section-subtitle">How does the UK become the world’s most advanced digital society?</p>
            <div class="home-interviews-scroller scroller-outer">
              <div class="scroller-navigation"><button class="scroller-previous" tabindex="-1">Previous</button><button class="scroller-next">Next</button></div>
              <div class="home-interviews-inner scroller-inner">
                @foreach ($interviews as $interview)
                  @include('interview.card')
                @endforeach
              </div>
            </div>
          </div>
        </section>
      @endif
  --}}

  <section class="section--home-quote">
    <div class="container">
      <div class="home-quote--text">
        <div class="quote-body">we want to use digital tools to help Parliament draw on the best ideas to get the UK’s digital policy right</div>
        <div class="quote-attribute">Liam Byrne MP, Shadow Digital Minister.</div>
      </div>
      <div class="home-quote--megaphone">
        <img src="images/megaphone.svg" alt="Megaphone illustration">
      </div>
    </div>
  </section>


  {{--
    @if($articles->count())
      <section class="section--home-articles">
        <div class="container">
          <h2 class="section-title">Articles</h2>
          <p class="section-subtitle">Stay updated and follow our progress</p>
          <div class="home-articles-scroller scroller-outer">
            @if ($articles->count() > 3)
              <div class="scroller-navigation"><button class="scroller-previous" tabindex="-1">Previous</button><button class="scroller-next">Next</button></div>
            @endif
            <div class="home-interviews-inner scroller-inner">
              @foreach ($articles as $article)
                @include('article.card')
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endif
  --}}

  <section class="section--home-stages">
    <div class="container">
      <h2 class="section-title">We want to create the best plan in the world.<br />That means finding the best ideas in the world.</h2>
      <p class="section-subtitle">Planning the most advanced digital society in the world involves three steps.</p>
      <div class="stages-container">
        <div class="stage-column">
          <img src="images/icon-suggest.svg" alt="">
          <h3 class="stage-heading">Suggest</h3>
          <p>Put forward your ideas or debate ideas others have proposed</p>
        </div>
        <div class="stage-column">
          <img src="images/icon-debate.svg" alt="">
          <h3 class="stage-heading">Improve</h3>
          <p>Review the draft plans which will be created based on your suggestions</p>
        </div>
        <div class="stage-column">
          <img src="images/icon-improve.svg" alt="">
          <h3 class="stage-heading">Launch</h3>
          <p>See the plan presented in Parliament to help shape national policy</p>
        </div>
      </div>
    </div>
  </section>



  <section class="section--home-quote">
    <div class="container">
      <div class="home-quote--text">
        <div class="quote-body">We believe the public want the opportunity to have their say in House of Commons debates; this will provide a useful resource for MPs and help to enhance those debates.</div>
        <div class="quote-attribute">Speaker’s Digital Democracy Commission, 2015</div>
      </div>
      <div class="home-quote--clock">
        <img src="images/westminster.svg" alt="Clock tower at Palace of Westminster">
      </div>
    </div>
  </section>

  <section class="section--home-questions">
    <div class="container">
      <h2 class="section-title">Questions and answers</h2>

      <div class="tabbed">
        <div class="tabs">
          <ul>
            <li>
              <a href="#section1">What is the People’s Plan?</a>
            </li>
            <li>
              <a href="#section2">Why are you doing this?</a>
            </li>
            <li>
               <a href="#section3">Will this make a difference?</a>
            </li>
          </ul>
          <img class="tab-image" src="/images/digitalglobe.svg" alt="">
        </div>
        <section id="section1">
          <h2>What is the People’s Plan?</h2>
          <p>In 2015, the Digital Democracy Commission set an ambitious goal: to make Parliament, ‘fully interactive and digital’ by 2020, using new technologies to involve the public in Parliamentary debates and drafting new laws.</p>
          <p>This site aims to help. We hope to accelerate digital democracy by pioneering new technologies to help Parliament get the United Kingdom’s policy for digital technology right.</p>
          <p>Created by Liam Byrne MP, Shadow Digital Minister, our ambition is to help all members of Parliament listen to and consult with citizens, business and trade unions as we share and debate ideas for the United Kingdom’s digital future.</p>
        </section>
        <section id="section2">
          <h2>Why are you doing this?</h2>
          <p>In 2015, Mr Speaker created a <a href="http://www.digitaldemocracy.parliament.uk/chapter/summary#main-content">Digital Democracy Commission</a>, to ‘to consider the challenges and opportunities for our democracy that digital technology presents’. It advised that Parliament should aim to become ‘fully interactive and digital’ by 2020. Around the world, parliaments, city governments, and political parties are stepping up the use of <a href="http://www.nesta.org.uk/event/how-can-digital-technology-strengthen-our-democracy">digital technology to help get plans and policies right</a>.</p>
          <p>We don’t want to be left behind. So we want to use some tried and tested techniques for using digital tools - to help Parliament debate and perfect, policy for a more digital United Kingdom. We won't just use digital tools - we'll also be running a host of events - but we know digital tools can help a lot.</p>
        </section>
        <section id="section3">
          <h2>Will this make a difference?</h2>
          <p>The People's Plan for Digital will help Parliament connect to the best ideas in the United Kingdom, and around the world, as it debates some of the most important questions for the future of our country.</p>
        </section>
      </div>
    </div>
  </section>
@stop
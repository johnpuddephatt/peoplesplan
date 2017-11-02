<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="css/app.css">

  </head>
  <body>
    <header class="masthead">
      <div class="container">
        <a href="/" title="Go to home page" rel="home" class="site-title">The People’s Plan</a>
        <!-- <nav></nav> -->
      </div>
    </header>

    <section class="section--home-header">
      <div class="container">
        <img src="images/homepage-header.svg" alt="">
        <h1 class="page-title page-title--home">Let’s plan the most advanced digital society in the world &ndash; together</h1>
      </div>
    </section>

    <section class="section--home-introduction">
      <div class="container">
        <div class="home-introduction--text">
          <p>In 2015, the Digital Democracy Commission set an ambitious goal: to make Parliament, ‘fully interactive and digital’ by 2020, using new technologies to involve the public in Parliamentary debates and drafting new laws.</p>
          <p>This site aims to help. We hope to hasten digital democracy by pioneering new technologies to help Parliament get Britain’s policy for digital technology right.</p>
          <p>Created by Liam Byrne MP, Shadow Digital Minister, our ambition is to help all members of government listen to and consult with citizens, business and trade unions as we share and debate ideas for Britain’s digital future.</p>
        </div>
        <div class="home-introduction--image">
          <img src="images/unitedkingdommap.svg" alt="Map of United Kingdom">
        </div>
      </div>
    </section>

    <section class="section--home-quote">
      <div class="container">
        <div class="home-quote--megaphone">
          <img src="images/megaphone.svg" alt="Megaphone illustration">
        </div>
        <div class="home-quote--text">
          <h3 class="quote-body">“we want to use digital tools to help Parliament draw on the best ideas to get Britain’s digital policy right”</h3>
          <p class="quote-attribute">Liam Byrne MP, Shadow Digital Minister.</p>
        </div>

      </div>
    </section>

    <section class="section--home-stages">
      <div class="container">
        <h3 class="section-title">The plan we create together will help all parliamentarians shape Britain’s plans and policies for digital technology.</h3>
        <p class="section-subtitle">Creating the plan involves three simple steps:</p>
        <div class="stages-container">
          <div class="stage-column">
            <img src="images/icon-suggest.svg" alt="">
            <h3>Suggest</h3>
            <p>Debate the proposed ideas as well as putting forward your own</p>
          </div>
          <div class="stage-column">
            <img src="images/icon-debate.svg" alt="">
            <h3>Improve</h3>
            <p>Based on your suggestions, we’ll publish draft plans for you to review</p>
          </div>
          <div class="stage-column">
            <img src="images/icon-improve.svg" alt="">
            <h3>Launch</h3>
            <p>The plan will be presented in Parliament to inform national policy</p>
          </div>
        </div>
        <p class="stages-conclusion">By working together we can form a plan that’s not only technologically advanced and good for wealth creation and social justice too.</p>
      </div>
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
    <section class="section--home-questions">
      <div class="container">
        <h3 class="section-title">Questions and answers</h3>
        <div class="tabs">
          <div class="tab">
            <input checked="checked" name="tab-group-1" id="tab-1" type="radio">
            <label for="tab-1">What is this?</label>
            <div class="content">
              <p>We want to gather together the ideas and advice to help Parliament create the best possible plan to help Britain become the most advanced digital society in the world. And we want to use digital tools to help. It's a collaborative policy process that’s both transparent and easy to participate in.</p>
            </div>
          </div>
          <div class="tab">
            <input name="tab-group-1" id="tab-2" type="radio">
            <label for="tab-2">Why are you doing this?</label>
            <div class="content">
              <p>In 2015, Mr Speaker created a <a href="http://www.digitaldemocracy.parliament.uk/chapter/summary#main-content">Digital Democracy Commission</a>, to ‘to consider the challenges and opportunities for our democracy that digital technology presents’. It advised that Parliament should aim to become ‘fully interactive and digital’ by 2020. Around the world, parliaments, city governments, and political parties are stepping up the use of <a href="http://www.nesta.org.uk/event/how-can-digital-technology-strengthen-our-democracy">digital technology to help get plans and policies right</a>.</p>
              <p>We don’t want to be left behind. So we want to use some tried and tested techniques for using digital tools - to help Parliament debate and perfect, policy for a more digital Britain. We won't just use digital tools - we'll also be running a host of events - but we know digital tools can help a lot.</p>
            </div>
          </div>
          <div class="tab">
            <input name="tab-group-1" id="tab-3" type="radio">
            <label for="tab-3">Will it make a difference?</label>
            <div class="content">
              <p>The People’s Plan has been started by Liam Byrne, MP for Hodge Hill in Birmingham.</p>
              <p>The People's Plan for Digital will help Parliament connect to the best ideas in Britain, and around the world, as it debates some of the most important questions for the future of our country.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="site-footer">
      <div class="container">
        <p>People’s Plan for Digital</p>
      </div>
    </footer>
  </body>
</html>


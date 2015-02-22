<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="/assets/stylesheets/application.css" rel="stylesheet">

    <!-- Javascript -->
    <script src="/assets/javascripts/application.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('partials._navigation')

    <div class="container-fluid main-content">
      @yield('content')
    </div>

    <footer class="container-fluid">
      <h3>Footer</h3>
      <p>This is my footer. Here I will put a lot of shit.</p>
    </footer>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/css/sweetalert.css">
      <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="/css/2bstaff.css">
      <title>2B-KMUTT On-Tour - {{ env('REGION') }}</title>
  </head>
  <body>
    <div class="background-image"></div>
    <div class="container">
      <center><img src="media/pic/newlogo-01.png" style="width: 40%"></center>
        <div class="collection">
          <div class="collection-item">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/jqueryRedir.js"></script>
    <script src="/js/chart.min.js"></script>
    @yield('extendScript')
  </body>
</html>

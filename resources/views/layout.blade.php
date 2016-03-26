<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Philippines and the World Directory">
  <meta name="author" content="">
  <meta name="token" content="{{ csrf_token() }}">

  <title>@if(isset($page_title)) {{ $page_title }} @else Corpwatcher.com @endif</title>

  <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  <link rel="shortcut icon" type="image/png" href="http://www.corpwatcher.com/favicon.png"/>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>

  <!-- Bootstrap Core CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link href="{{ url('css/blog-home.css') }}" rel="stylesheet">

    <!-- jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    body {
      font-family: 'Open Sans', sans-serif;
    }
    .navbar-inverse .navbar-nav>li>a {
      color: #403E3E;
      font-weight: bold;
    }
    .navbar-inverse {
      background-color: #fff;
      border-color: #D3401A;
    }
    .navbar-inverse .navbar-brand,
    .navbar-inverse .navbar-brand:hover,
    .navbar-inverse .navbar-brand:visited,
    .navbar-inverse .navbar-brand:focus,
    .navbar-inverse .navbar-brand:active {
      padding: 0px;
      color: #FFFFFF;
      background: #D3401A;
      font-weight: bolder;
    }
    .navbar-inverse .navbar-nav>li>a:focus,
    .navbar-inverse .navbar-nav>li>a:hover {
      color: #D3401A;
    }
    a {
      color: #403e3e;
    }
    h1, h2  {
      padding-bottom: 9px;
      margin: 20px 0 20px;
      border-bottom: 1px solid #eee;
      font-size: 24px !important;
      letter-spacing: 0 !important;
      color: #d3401a;
    }
    .page-header {
      display: inline-block;
      font-size: 44px !important;
      color: #403e3e;
      margin: 10px 5px;
      font-weight: bold;
      text-transform: capitalize;
    }
    .similar_boxes p a {
      font-size: 13px;
      color: #8E8E8E;
    }
    .navbar-inverse .navbar-toggle .icon-bar {
      background-color: #D3401A;
    }
    .footer-nav li {
      display: inline-block;
      padding: 0px 10px;
      border-right: 1px solid;
    }
    .footer-nav li:last-child {
      border-right: none;
    }

    .category-list li {
      white-space: normal !important;
    }
    .category-list li a {
      font-size: 17px;
      margin: 5px 0px;
      display: block;
      font-weight: bold;
    }
    .company-box ul li a {
      display: block;
      padding: 3px 0px;
      line-height: 18px;
    }
    .company-name {
      display: block;
      overflow: hidden;
      white-space: nowrap;
      text-transform: capitalize;
      text-overflow: ellipsis;
    }
    .btn-primary {
      color: #fff;
      background-color: #D3401A;
      border-color: #D3401A;
    }
    </style>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70843596-1', 'auto');
    ga('send', 'pageview');

    </script>
  </head>

  <body>

    @include('nav')

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-md-12">
          <div class="well">
            <h4>Search</h4>
            <div class="input-group">
              <input type="text" class="form-control" id="search">
              <span class="input-group-btn">
                <button class="btn btn-default" id="search-btn" type="button">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
            </div>
            <!-- /.input-group -->
          </div>
        </div>

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

         @include('sidebar')

       </div>

     </div>
     <!-- /.row -->

     <hr>

     @include('footer')

   </div>
   <!-- /.container -->



   <!-- Bootstrap Core JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <script type="text/javascript">
   $(document).ready(function(){
    $("#search-btn").click(function(e){
      e.preventDefault();
      var search = $("#search").val();
      window.location = "/search/" + search;
    });
    $(document).keypress(function(e) {
      if(e.which == 13) {
        if($("#search").is(":focus")){
          var search = $("#search").val();
          if(search != ""){
            window.location = "/search/" + search;
          }
        }
      }
    });
  });
   </script>
 </body>

 </html>

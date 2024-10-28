<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') </title>
	<!-- jQuery -->
  <script src="{{asset('/')}}vendors/jquery/dist/jquery.min.js"></script>
	<!-- chart.js -->
	<script src="{{asset('/')}}vendors/Chart.js/dist/Chart.min.js"></script>
	<style>
		@page {
        margin-left: 5em;
    }
	  body {
	    margin-top: 1em;
	    font-family:Arial, Helvetica, sans-serif;
	  }
	  .header {
	    text-align: center;
	    font-weight: bold;
	    font-size: 14pt;
	    background-color: midnightblue;
	    color: white;
	    padding: 5px;

	  }
	  .subheader {
	    text-align: left;
	    font-weight: bold;
	    font-size: 12pt;
	    /*background-color: midnightblue;*/
	    color: midnightblue;
	    padding: 10px;
	  }
	  table.simple {
	    border-spacing: 0px;
	    vertical-align: top;
	    border-collapse: collapse;
	    font-size: 9pt;
	  }
	  table.simple tr td,
	  table.simple tr th {
	    padding: 10px;
	    text-align: left;
	  }

	  table.bordasimples {
	    border-spacing: 0px;
	    border: 3 solid dimgray;
	    vertical-align: top;
	    border-collapse: collapse;
	    font-size: 10pt;
	  }

	  table.bordasimples tr td,
	  table.bordasimples tr th {
	    border: 1px solid dimgray;
	    vertical-align: top;
	    padding: 5px;
	  }
	  table.bordasimples td.title {
	    background-color: midnightblue;
	    color: whitesmoke;
	    text-align: center;
	    margin: 0px;
	  }
	  table.bordasimples td.value {
	    background-color: white;
	    color: black;
	    margin: 0px;
	    font-size: 9pt;
	  }
	  ol {
	    margin: 0px 15px;
	    padding: 0px
	  }
	  .tengah {
	    text-align: center;
	  }
	  .kanan {
	    text-align: right;
	  }
	  .kecil {
	    font-size: 9pt;
	  }
	  .page_break { page-break-before: always; }
	  img {
	    height: 500px;margin-top: 25px;
		}
	  .warning{
	  	background-color: yellow;
	  }
	  .danger{
	  	background-color: red;
	  }
	  .judul-gambar{
	  	text-align: center;
	  	font-size: 10pt;
	  	margin-bottom: 20px
	  }
	  #map {
	    height: 360px;
	    width: :100%;
		}
	</style>
</head>
<body>
	@yield('content')
</body>
</html>
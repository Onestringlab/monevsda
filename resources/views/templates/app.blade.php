@if (session()->get('name')!='' && session()->has('name'))
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') </title>

    <!-- Bootstrap -->
    <link href="{{asset('/')}}vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/')}}vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/')}}vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{asset('/')}}vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('/')}}build/css/custom.min.css" rel="stylesheet">

    <!-- CSS Public -->
    <link href="{{asset('/')}}css/custom.css" rel="stylesheet">

    @if(session()->get('role')!='Superman')
      <style type="text/css" media="print">
        BODY {display:none;visibility:hidden;}
      </style>
    @endif

    <!-- jQuery -->
    <script src="{{asset('/')}}vendors/jquery/dist/jquery.min.js"></script>
    <!-- tableToCSV.js -->
    <script src="{{asset('/')}}js/tableToCSV.js" rel="stylesheet"></script>
    <!-- tableSearch.js -->
    <script src="{{asset('/')}}js/tableSearch.js" rel="stylesheet"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title text-center" style="border: 0; padding-top: 10px">
              <!-- <a href="{{ asset('/app')}}" class="site_title"><i class="fa fa-desktop"></i> <span>e-Monev SDA</span></a> -->
              <img src="{{asset('/')}}images/EMONEV-SDA.png" alt="" width="75px">
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('/')}}dataunggah/gambar/{{ session() -> get('photo')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>
                @if (session()->has('name'))
                  {{session()->get('name')}}
                @endif
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  @if(session()->get('role')=='Guest' || session()->get('role')=='Admin' || session()->get('role')=='Superman')
                    <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{asset('/')}}dashboard1">Dasbor Pekerjaan</a></li>
                        <li><a href="{{asset('/')}}dashboard2">Dasbor Keuangan</a></li>
                        <li><a href="{{asset('/')}}pekerjaancari">Pencarian Pekerjaan</a></li>
                      </ul>
                    </li>
                  @endif
                  @if(session()->get('role')=='Superman' || (session()->get('role')=='Admin'))
                  <li><a><i class="fa fa-desktop"></i> Monitoring <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/')}}pekerjaanall">Pekerjaan</a></li>
                      <li><a href="{{asset('/')}}program">Program - Kegiatan - Pekerjaan</a></li>
                    </ul>
                  </li>
                  @endif
                  @if(session()->get('role')=='Guest'|| session()->get('role')=='Superman' || (session()->get('role')=='Admin'))
                  <li><a><i class="fa fa-archive"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/')}}lappekstat">Status Pekerjaan</a></li>
                      <li><a href="{{asset('/')}}lapstatkemajuan">Status Kemajuan Pekerjaan</a></li>
                      <li><a href="{{asset('/')}}lappekexpired">Status  Pekerjaan Kontrak Berakhir</a></li>
                      <li><a href="{{asset('/')}}lappekakanexpired">Status  Pekerjaan Kontrak Akan Berakhir</a></li>
                      <li><a href="{{asset('/')}}lappekcair">Status Pencairan Dana Pekerjaan</a></li>
                      <li><a href="{{asset('/')}}lappeklok">Lokasi Pekerjaan</a></li>
                      <li><a href="{{asset('/')}}lappekpej">Pekerjaan dan Pejabat</a></li>
                      <li><a href="{{asset('/')}}lappekkon">Pekerjaan dan Pelaksana</a></li>
                      <li><a href="{{asset('/')}}lapprokegpek">Program Kegiatan Pekerjaan</a></li>
                      <li><a href="{{asset('/')}}laphasilpro">Hasil Pelaksanaan Program</a></li>
                    </ul>
                  </li>
                  @endif
                  @if(session()->get('role')=='Superman' || (session()->get('role')=='Admin'))
                  <li><a><i class="fa fa-database"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/')}}kecamatan">Kecamatan - Desa</a></li>
                      <li><a href="{{asset('/')}}konsultan">Konsultan dan Kontraktor</a></li>
                      <li><a href="{{asset('/')}}sk">SK - Penjabat</a></li>
                    </ul>
                  </li>
                  @endif
                  @if(session()->get('role')=='Admin' || session()->get('role')=='Superman')
                    <li><a><i class="fa fa-book"></i>Dokumen<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{asset('/')}}dokumen/manual_emonevsdakr.pdf" target="_blank">Petunjuk Penggunaan</a></li>
                        <!-- <li><a href="index2.html">Dashboard2</a></li>
                        <li><a href="index3.html">Dashboard3</a></li> -->
                      </ul>
                    </li>
                  @endif
                  @if(session()->get('role')=='Superman')
                  <li><a><i class="fa fa-odnoklassniki"></i> Superman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!-- <li><a href="{{asset('/')}}hakakses">Hak Akses</a></li> -->
                      <li><a href="{{asset('/')}}lov">Lov</a></li>
                      <li><a href="{{asset('/')}}log">Log Aktifitas</a></li>
                      <li><a href="{{asset('/')}}pengawas">Pengawas</a></li>
                      <li><a href="{{asset('/')}}username">Pengguna</a></li>
                    </ul>
                  </li>
                  @endif
                  @if(session()->get('role')=='Pengawas')
                  <li><a><i class="fa fa-odnoklassniki"></i> Pengawas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/')}}pekerjaanpengawas">Pekerjaan</a></li>
                    </ul>
                  </li>
                  @endif
                 <!--  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <!-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('/')}}dataunggah/gambar/{{session()->get('photo')}}" alt="">
                    @if (session()->has('name'))
                      {{session()->get('name')}}
                    @endif
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="{{asset('/')}}keluar"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <li>
                  <div style="margin-top: 20px; font-weight: bold;"> Tahun Anggaran
                    @if (session()->has('ta'))
                      {{session()->get('ta')}}
                    @endif
                  </div>
                </li>
                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div style="margin-top:70px">
            @yield('content')
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            e-Monev SDA Ver.1.0 - Dinas PUPR KKR {{ session()->get('ta') }}
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- compose -->
    <!-- <div class="compose col-md-6 col-xs-12">sdfsdf
      <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p>
                </a>
              </li>
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
            <div class="dropdown-menu input-append">
              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
              <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
        </div>

        <div id="editor" class="editor-wrapper"></div>
      </div>

      <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
      </div>
    </div> -->
    <!-- /compose -->

    <!-- Bootstrap -->
    <script src="{{asset('/')}}vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('/')}}vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{asset('/')}}vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('/')}}vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="{{asset('/')}}vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="{{asset('/')}}vendors/google-code-prettify/src/prettify.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('/')}}build/js/custom.js"></script>
    <!-- chart.js -->
    <script src="{{asset('/')}}vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="{{asset('/')}}vendors/Chart.js/dist/Chart.bundle.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
          //Disable cut copy
          // $('body').bind('cut copy', function (e) {
          //     e.preventDefault();
          // });
          //Disable mouse right click
          // $("body").on("contextmenu",function(e){
              // return false;
          // });
      });
    </script>

  </body>
</html>
@else
  {{ abort(404) }}
@endif

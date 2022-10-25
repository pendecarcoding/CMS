<?php
use App\Cmenu;
use App\AplikasiModel;
$apps        = AplikasiModel::where('id_app','1')->first();
$level       = Session::get('level');
$profil      = App\Loginmodel::where('id_user',Session::get('id_user'))->first();
$li          = new Cmenu();
$listmenu    = $li->getnavbar($level);
$listheader  = $li->getheader($level);
//$listmenuall = $li->getsideall($level);
 ?>
<!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin6">
          <nav class="navbar top-navbar navbar-expand-md">
              <div class="navbar-header" data-logobg="skin6">
                  <!-- This is for the sidebar toggle which is visible on mobile only -->
                  <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                          class="ti-menu ti-close"></i></a>
                  <!-- ============================================================== -->
                  <!-- Logo -->
                  <!-- ============================================================== -->
                  <div class="navbar-brand" style="margin-left:20px;">
                      <!-- Logo icon -->
                      <a href="index.html">
                          <b class="logo-icon">
                              <!-- Dark Logo icon -->
                              <img style="width:70px;height:80px;margin-left:40px;margin-right:40px;margin-top:20px;" src="{{asset('theme/aplikasi/'.$apps->logo)}}" alt="homepage" class="dark-logo" />

                              <!-- Light Logo icon -->

                          </b>
                          <!--End Logo icon -->
                        </a>
                          <!-- Logo text -->

                  </div>
                  <!-- ============================================================== -->
                  <!-- End Logo -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- Toggle which is visible on mobile only -->
                  <!-- ============================================================== -->
                  <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                      data-toggle="collapse" data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                          class="ti-more"></i></a>
              </div>
              <!-- ============================================================== -->
              <!-- End Logo -->
              <!-- ============================================================== -->
              <div class="navbar-collapse collapse" id="navbarSupportedContent">
                  <!-- ============================================================== -->
                  <!-- toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                      <!-- Notification -->
                      @foreach($listmenu as $i=>$v)<?php
                        $item = $v->dropdown;
                        switch ($item) {
                          case 'Y':
                            ?>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                  id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false">
                                  <span><i data-feather="{{$v->icon}}" class="svg-icon"></i></span>
                                  <span class="badge badge-primary notify-no rounded-circle">5</span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                  <ul class="list-style-none">
                                      <li>
                                          <div class="message-center notifications position-relative">
                                              <!-- Message -->
                                              <a href="javascript:void(0)"
                                                  class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                  <div class="btn btn-danger rounded-circle btn-circle"><i
                                                          data-feather="airplay" class="text-white"></i></div>
                                                  <div class="w-75 d-inline-block v-middle pl-2">
                                                      <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                      <span class="font-12 text-nowrap d-block text-muted">Just see
                                                          the my new
                                                          admin!</span>
                                                      <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="javascript:void(0)"
                                                  class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                  <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                          data-feather="calendar" class="text-white"></i></span>
                                                  <div class="w-75 d-inline-block v-middle pl-2">
                                                      <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                      <span
                                                          class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                          a reminder that you have event</span>
                                                      <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="javascript:void(0)"
                                                  class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                  <span class="btn btn-info rounded-circle btn-circle"><i
                                                          data-feather="settings" class="text-white"></i></span>
                                                  <div class="w-75 d-inline-block v-middle pl-2">
                                                      <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                      <span
                                                          class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                          can customize this template
                                                          as you want</span>
                                                      <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="javascript:void(0)"
                                                  class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                  <span class="btn btn-primary rounded-circle btn-circle"><i
                                                          data-feather="box" class="text-white"></i></span>
                                                  <div class="w-75 d-inline-block v-middle pl-2">
                                                      <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                          class="font-12 text-nowrap d-block text-muted">Just
                                                          see the my admin!</span>
                                                      <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                  </div>
                                              </a>
                                          </div>
                                      </li>
                                      <li>
                                          <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                              <strong>Check all notifications</strong>
                                              <i class="fa fa-angle-right"></i>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                          <?php
                          break;
                          case 'N':
                          ?>

                          <?php
                        break;

                        default:
                          // code...
                        break;
                      }
                     ?>
                      @endforeach

                  </ul>
                  <!-- ============================================================== -->
                  <!-- Right side toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav float-right">
                      <!-- ============================================================== -->
                      <!-- Search -->
                      <!-- ============================================================== -->
                      <!--<li class="nav-item d-none d-md-block">
                          <a class="nav-link" href="javascript:void(0)">
                              <form>
                                  <div class="customize-input">
                                      <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                          type="search" placeholder="Search" aria-label="Search">
                                      <i class="form-control-icon" data-feather="search"></i>
                                  </div>
                              </form>
                          </a>
                      </li>
                      <!-- ============================================================== -->
                      <!-- User profile and search -->
                      <!-- ============================================================== -->
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <img src="{{asset('theme/users/'.$profil->foto)}}" alt="user" class="rounded-circle"
                                  width="40">
                              <span class="ml-2 d-none d-lg-inline-block"><span>Hay,</span> <span
                                      class="text-dark">{{$profil->nama}}</span> <i data-feather="chevron-down"
                                      class="svg-icon"></i></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            @foreach($listheader as $i=>$v)
                              <a class="dropdown-item" href="{{$v->url}}"><i data-feather="{{$v->icon}}"
                                      class="svg-icon mr-2 ml-1"></i>
                              {{$v->name}}</a>
                            @endforeach

                          </div>
                      </li>
                      <!-- ============================================================== -->
                      <!-- User profile and search -->
                      <!-- ============================================================== -->
                  </ul>
              </div>
          </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->

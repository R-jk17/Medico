
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Medico - Accueil </title>

    <meta name="description" content="" />

    
    @extends('css')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
       @extends('sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                  <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest


                </ul>
            </div>
              <!-- /Search -->

              
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          
        <div class="content-wrapper">

            <!-- Content -->
            <div class="demo-inline-spacing accl">

              <button type="button" class="btn btn-xl btn-primary" >
                <a class="a1" href="rendezs/create"><i class="tf-icons bx bx-file">
                  </i> Rendez-Vous </a>
              </button>
                
              <button type="button" class="btn btn-xl btn-primary" >
                <a class="a1" href="dossiers"><i class="tf-icons bx bx-file">
                  </i> Dossiers patients</a>
              </button>

            </div>

            <!-- Tabs -->
           

            <div class="container-xxl flex-grow-1 container-p-y">
              

              <div class="row">
                <div class="col-md-12">
                  
                  <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                          <th>L'heure</th>
                          
                          <th>Nom</th>
                          <th>prénom</th>
                          <th>N°Tlf</th>
                          <th>gender</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @if(count($appointments))
                      @foreach($appointments as $appointment)
                      <tr>
                        <td>{{$appointment->heure }}</td>
                        
                        <td>{{$appointment->nom }}</td>
                        <td>{{$appointment->prenom }}</td>
                        <td>{{$appointment->tlf }}</td>
                        <td>{{$appointment->gender }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('rendezs/'. $appointment->id )}}"
                                ><i class='bx bx-file'></i></i>Show</a
                              >
                              <a class="dropdown-item" href="{{ route('rendez.confirm', $appointment->id) }}" 

                                ><i class="bx bx-edit-alt me-1"></i> Confirmer</a
                              >
                              <a class="dropdown-item" href="{{url('rendezs/'. $appointment->id.'/edit' )}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              
                              <a class="dropdown-item" href="javascript:void(0);"
                                title="Delete " onclick="return confirm("confirm delete ?")">
                                <form method="POST" action="{{url('rendezs'.'/'. $appointment->id )}}" accept-charset="UTF_8" style="" >
                                  {{method_field('DELETE')}}
                                  {{ csrf_field() }} </form>

                                <i class="bx bx-trash me-1"></i> Supprimer</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <td></td>
                        
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      @endif
                       
                     
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->



                    </div>
                  </div>
                </div>
              </div>

            
          <!-- Content wrapper -->
        </div>
        

        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    
    </div>

    @extends('js')
  </body>
</html>




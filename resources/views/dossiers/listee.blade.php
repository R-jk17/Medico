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
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Medico/Patient</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @extends('sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page ">
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
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <div class="col-lg-66">
                
                <div class="demo-inline-spacing mt-3">
                  <div class="list-group list-group-horizontal-md text-md-center">
                    
                    
                    <a
                      class="list-group-item list-group-item-action active"
                      id="messages-list-item"
                      data-bs-toggle="list"
                      href="#dossier"
                      ><i class='bx bx-file'></i> Dossiers patients </a
                    >
                    
                  </div>
                  <div class="card mb-4">
                  <div class="card-body">
                  <div class="row">
                  <div class="tab-content px-0 mt-0">

                    <div class="tab-pane fade show active" id="dossier">
                      <!-- Example Code -->
    
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="toutd-tab" data-bs-toggle="tab" data-bs-target="#toutd-tab-pane" type="button" role="tab" aria-controls="toutd-tab-pane" aria-selected="true">Tout</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="moisd-tab" data-bs-toggle="tab" data-bs-target="#moisd-tab-pane" type="button" role="tab" aria-controls="moisd-tab-pane" aria-selected="false">par mois</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="anneed-tab" data-bs-toggle="tab" data-bs-target="#anneed-tab-pane" type="button" role="tab" aria-controls="anneed-tab-pane" aria-selected="false">par Année</button>
                        </li>

                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="toutd-tab-pane" role="tabpanel" aria-labelledby="toutd-tab" tabindex="0">
                          <!-- Responsive Table -->
                          <div class="card">
                            
                              <div class="table-responsive text-nowrap">
                                <table class="table">
                                <thead>
                                <tr class="text-nowrap">
                                  <th>N°Dossier</th>
                                  <th>Nom</th>
                                  <th>Prénom</th>
                                  <th>N°Tlf</th>
                                  <th>Gender</th>
                                  <th>created_at</th>
                                  <th>Action</th>
  
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                  @foreach($dossier as $item)
                                  <tr>
                                    <td>{{$item->id }}</td>
                                    <td>{{$item->nompatient }}</td>
                                    <td>{{$item->prenompatient }}</td>
                                    <td>{{$item->tlfp }}</td>
                                    <td>{{$item->gender }}</td>
                                    <td>{{$item->created_at }}</td>
                                  <td>
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('dossiers/'. $item->id )}}"
                                          ><i class="bx bx-edit-alt me-1"></i> view</a
                                        >
                                        <a class="dropdown-item" href="{{url('dossiers/'. $item->id.'/edit' )}}"
                                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        
                                        <a class="dropdown-item" href="javascript:void(0);"
                                          title="Delete " onclick="return confirm("confirm delete ?")">
                                          <form method="POST" action="{{url('dossiers'.'/'. $item->id )}}" accept-charset="UTF_8" style="" >
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }} </form>
        
                                          <i class="bx bx-trash me-1"></i> Supprimer</a
                                        >
                                     
                                      </div>
                                    </div>
                                  </td>
  
                                </tr>
                                
                                
                                </tbody>
                                </table>
                              </div>
                            </div>
                            <!--/ Responsive Table -->
                          </div>

                        
                        </div>
    
                      <!-- End Example Code -->
                      
                    </div>
                    
                    
                  </div>
                  </div>
                  </div>
                </div>
              
              </div>

            </div>
            <!-- / Content -->

            

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

<div class="right-bar">
   <div data-simplebar class="h-100">
       <!-- Nav tabs -->
       <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
          <li class="nav-item">
               <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                   <i class="fe-settings noti-icon d-block font-22 my-1"></i>
               </a>
           </li>
       </ul>
       <!-- Tab panes -->
       <div class="tab-content pt-0">
           <div class="tab-pane active" id="settings-tab" role="tabpanel">
               <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                   <span class="d-block py-1">Theme Settings</span>
               </h6>

               <div class="p-3">
                   {{-- <div class="alert alert-warning" role="alert">
                       <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                   </div> --}}

                   <h6 class="font-weight-medium font-14 mt-2 mb-2 pb-1">Color Scheme</h6>
                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                           id="light-mode-check"/>
                       <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                   </div>

                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                           id="dark-mode-check" checked/>
                       <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                   </div>

                   <!-- Width -->
                   <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                       <label class="custom-control-label" for="fluid-check">Fluid</label>
                   </div>
                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                       <label class="custom-control-label" for="boxed-check">Boxed</label>
                   </div>

                   <!-- Menu positions -->
                   <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Menus Positon <small>(Leftsidebar and Topbar)</small></h6>

                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="menus-position" value="fixed" id="fixed-check"/>
                       <label class="custom-control-label" for="fixed-check">Fixed</label>
                   </div>

                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="menus-position" value="scrollable" id="scrollable-check" checked/>
                       <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                   </div>

                   <!-- Left Sidebar-->
                   <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="leftsidebar-color" value="light" id="light-check"  />
                       <label class="custom-control-label" for="light-check">Light</label>
                   </div>

                   <div class="custom-control custom-switch mb-1">
                       <input type="radio" class="custom-control-input" name="leftsidebar-color" value="dark" id="dark-check" checked/>
                       <label class="custom-control-label" for="dark-check">Dark</label>
                   </div>

                   <!-- User info -->
                   <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                   <div class="custom-control custom-switch mb-1">
                       <input type="checkbox" class="custom-control-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                       <label class="custom-control-label" for="sidebaruser-check">Enable</label>
                   </div>

                   <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>
               </div>
           </div>
       </div>
   </div> <!-- end slimscroll-menu-->
</div>
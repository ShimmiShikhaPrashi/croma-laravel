<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false"><i
                class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                @if(Auth::user()->role === 'admin')
                    <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/crud" aria-expanded="false"><i
                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">CRUD</span></a>
                    </li>
                @endif   
                    
                @if(Auth::user()->role === 'user')
                    <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/banner" aria-expanded="false"><i
                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">Banner</span></a>
                    </li>    
                @endif    
                </ul>
              </li>

             </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
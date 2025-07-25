 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">
         </li><!-- End Dashboard Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ url('service') }}">
                         <i class="bi bi-circle"></i><span>Services</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('customer.index') }}">
                         <i class="bi bi-circle"></i><span>Pelanggan</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('level.index') }}">
                         <i class="bi bi-circle"></i><span>Level</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('user.index') }}">
                         <i class="bi bi-circle"></i><span>User</span>
                     </a>
                 </li>
                 {{-- <li>
                     <a href="components-accordion.html">
                         <i class="bi bi-circle"></i><span>Accordion</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-badges.html">
                         <i class="bi bi-circle"></i><span>Badges</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-breadcrumbs.html">
                         <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-buttons.html">
                         <i class="bi bi-circle"></i><span>Buttons</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-cards.html">
                         <i class="bi bi-circle"></i><span>Cards</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-carousel.html">
                         <i class="bi bi-circle"></i><span>Carousel</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-list-group.html">
                         <i class="bi bi-circle"></i><span>List group</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-modal.html">
                         <i class="bi bi-circle"></i><span>Modal</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-tabs.html">
                         <i class="bi bi-circle"></i><span>Tabs</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-pagination.html">
                         <i class="bi bi-circle"></i><span>Pagination</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-progress.html">
                         <i class="bi bi-circle"></i><span>Progress</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-spinners.html">
                         <i class="bi bi-circle"></i><span>Spinners</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-tooltips.html">
                         <i class="bi bi-circle"></i><span>Tooltips</span>
                     </a>
                 </li> --}}
             </ul>
         </li><!-- End Components Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{route('trans.index')}}">
                         <i class="bi bi-circle"></i><span>Trans Order</span>
                     </a>
                 </li>
                 {{-- <li>
                     <a href="{{route('pembayaran.index')}}">
                         <i class="bi bi-circle"></i><span>Pembayaran</span>
                     </a>
                 </li> --}}
             </ul>
         </li><!-- End Forms Nav -->

     </ul>

 </aside><!-- End Sidebar-->

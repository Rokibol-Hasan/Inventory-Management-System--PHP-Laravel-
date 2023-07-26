 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('dashboard') }}" class="waves-effect">
                         <i class="ri-dashboard-line"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>

                 {{-- <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-calendar-2-line"></i>
                         <span>Own Agro Products</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('purchase.all') }}">Product Quality Assurance</a></li>
                         <li><a href="{{ route('purchase.all') }}">All Included Products</a></li>
                         <li><a href="{{ route('purchase.pending') }}">Pending Products</a></li>
                     </ul>
                 </li> --}}

                 <li class="menu-title">Basic Functions</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fas fa-truck-pickup"></i>
                         <span>Supplier</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('supplier.all') }}">All Supplier</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fas fa-user"></i>
                         <span>Customers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('customer.all') }}">All Customer</a></li>
                          <li><a href="{{ route('credit.customer') }}">Credit Customer</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fab fa-pushed"></i>
                         <span>Unit</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('unit.all') }}">All Unit</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fas fa-clipboard-list"></i>
                         <span>Category</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('category.all') }}">All Categories</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fab fa-product-hunt"></i>
                         <span>Products</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('product.all') }}">All Products</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-calendar-2-line"></i>
                         <span>Purchases</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('purchase.all') }}">All Purchase</a></li>
                         <li><a href="{{ route('purchase.pending') }}">Pending Purchase</a></li>
                         <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" fas fa-file-invoice-dollar"></i>
                         <span>Invoices</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('invoice.all') }}">All Invoices</a></li>
                         <li><a href="{{ route('invoice.pending.list') }}">Pending Invoices</a></li>
                         <li><a href="{{ route('print.invoice.list') }}">Print Invoice</a></li>
                         <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
                     </ul>
                 </li>

                 <li class="menu-title">Stock Management</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-account-circle-line"></i>
                         <span>Manage Stock</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('stock.report') }}">Stock Report</a></li>
                         <li><a href="{{ route('stock.supplier.wise') }}">Supplier/Product Wise</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-profile-line"></i>
                         <span>Utility</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="pages-starter.html">Starter Page</a></li>
                         <li><a href="pages-timeline.html">Timeline</a></li>
                         <li><a href="pages-directory.html">Directory</a></li>
                         <li><a href="pages-invoice.html">Invoice</a></li>
                         <li><a href="pages-404.html">Error 404</a></li>
                         <li><a href="pages-500.html">Error 500</a></li>
                     </ul>
                 </li>






             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>

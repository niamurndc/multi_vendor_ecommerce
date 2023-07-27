<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
    <h5>@if(auth()->user()->role == 1) Admin Panel @else Seller Panel @endif</h5>
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
      <div class="simplebar-height-auto-observer-wrapper">
        <div class="simplebar-height-auto-observer">
        </div>
      </div>
      <div class="simplebar-mask">
        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
          <div class="simplebar-content-wrapper" style="height: 100%;">
            <div class="simplebar-content" style="padding: 0px;">
              <li class="nav-item">
                <a class="nav-link" href="/admin/home">
                  <i class="fa fa-dashboard nav-icon"></i> Dashboard
                </a>
              </li>

              <li class="nav-title">Product</li>

              <li class="nav-item">
                <a class="nav-link" href="/admin/brands">
                  <i class="fa fa-diamond nav-icon"></i> Brand
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/categories">
                  <i class="fa fa-tags nav-icon"></i> Category
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/product/create">
                  <i class="fa fa-plus-circle nav-icon"></i> Add Product
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/products">
                  <i class="fa fa-th-large nav-icon"></i> Products
                </a>
              </li>

              
              
              <li class="nav-title">Order & Customers</li>

              <li class="nav-item">
                <a class="nav-link" href="/admin/orders">
                  <i class="fa fa-th-list nav-icon"></i> Orders
                </a>
              </li>


              @if(auth()->user()->role == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/customers">
                  <i class="fa fa-users nav-icon"></i> Customers
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a class="nav-link" href="/admin/curriers">
                  <i class="fa fa-paper-plane nav-icon"></i> Currier
                </a>
              </li>

              @if(auth()->user()->role == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/areas">
                  <i class="fa fa-thumb-tack nav-icon"></i> Area
                </a>
              </li>
              @endif

              @if(auth()->user()->role == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/reviews">
                  <i class="fa fa-star nav-icon"></i> Reviews
                </a>
              </li>
              @endif

              <li class="nav-title">Seller & Multivendor</li>
              @if(auth()->user()->role == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/sellers">
                  <i class="fa fa-street-view nav-icon"></i> Sellers
                </a>
              </li>
              @endif

              <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                  <i class="fa fa-file-text-o nav-icon"></i> Withdraw
                </a>
                <ul class="nav-group-items">
                  @if(auth()->user()->role == 2)
                  <li class="nav-item"><a class="nav-link" href="/admin/withdraw/add"><span class="nav-icon"></span> Withdraw Money</a></li>
                  @endif
                  <li class="nav-item"><a class="nav-link" href="/admin/withdraws"><span class="nav-icon"></span> Withdraw List</a></li>
                  @if(auth()->user()->role == 1)
                  <li class="nav-item"><a class="nav-link" href="/admin/withdraw/pending"><span class="nav-icon"></span> Pending Withdraw List</a></li>
                  @endif
                  

                </ul>
              </li>

              <li class="nav-title">Report & Inventory</li>

              <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                  <i class="fa fa-file-text-o nav-icon"></i> Report
                </a>
                <ul class="nav-group-items">
                  <li class="nav-item"><a class="nav-link" href="/admin/report/sell"><span class="nav-icon"></span> Sale Report</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/report/product-sell"><span class="nav-icon"></span> Product Wise Sale</a></li>
                  

                </ul>
              </li>

              <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                  <i class="fa fa-truck nav-icon"></i> Inventory
                </a>
                <ul class="nav-group-items">
                  <li class="nav-item"><a class="nav-link" href="/admin/inventories"><span class="nav-icon"></span> All</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/inventories/category"><span class="nav-icon"></span> Category Wise</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/inventories/brand"><span class="nav-icon"></span> Brand Wise</a></li>
                </ul>
              </li>

              @if(auth()->user()->role == 1)
              <li class="nav-title">SMS Panel</li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/sms/setting">
                  <i class="fa fa-street-view nav-icon"></i> Configure SMS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/sms-lists">
                  <i class="fa fa-street-view nav-icon"></i> Sender List
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/sms-send">
                  <i class="fa fa-street-view nav-icon"></i> Send SMS
                </a>
              </li>
              @endif

              <li class="nav-title">Settings & Backup</li>

              @if(auth()->user()->role == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/payments">
                  <i class="fa fa-money nav-icon"></i> Payment Method
                </a>
              </li>
              <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                  <i class="fa fa-cog nav-icon"></i> Setting
                </a>
                <ul class="nav-group-items">
                  <li class="nav-item"><a class="nav-link" href="/admin/sliders"><span class="nav-icon"></span> Slider</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/feature"><span class="nav-icon"></span> Fetured Section</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/settings"><span class="nav-icon"></span> Site Setting</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/seo"><span class="nav-icon"></span> SEO Setting</a></li>
                  <li class="nav-item"><a class="nav-link" href="/admin/pages"><span class="nav-icon"></span> Page Setting</a></li>
                </ul>
              </li>
              @endif

              <li class="nav-item">
                <a class="nav-link" href="/admin/profile">
                  <i class="fa fa-user-o nav-icon"></i> Profile
                </a>
              </li>

              @if(auth()->user()->role == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/backups">
                  <i class="fa fa-database nav-icon"></i> Backup
                </a>
              </li> 
              @endif       
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
      <div class="simplebar-scrollbar" style="width: 0px; display: none;">
      </div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
      <div class="simplebar-scrollbar" style="height: 132px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
    </div>
  </ul>
  <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
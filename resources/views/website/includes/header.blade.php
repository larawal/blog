<section class="header-top">
    <div class="container box_1170">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="index.html" class="logo">
              <img src="{{ asset('website/img/logo.png') }}" alt="">
              </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 search-trigger">
              <a href="#" class="search">
              <i class="lnr lnr-magnifier" id="search"></i>
            </a>
          </div>
        </div>
    </div>
</section>


<header id="header">
    <div class="container box_1170 main-menu">
        <div class="row align-items-center justify-content-center d-flex">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu-active"><a href="index.html">Home</a></li>
                  <li><a href="category.html">Category</a></li>
                  <li><a href="archive.html">Archive</a></li>
                  <li class="menu-has-children"><a href="">Pages</a>
                  <ul>
                    <li><a href="elements.html">Elements</a></li>
                  </ul>
                  </li>
                  <li class="menu-has-children"><a href="">Blog</a>
                  <ul>
                    <li><a href="blog-details.html">Blog Details</a></li>
                  </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container box_1170">
            <form class="d-flex justify-content-between">
              <input type="text" class="form-control" id="search_input" placeholder="Search Here">
              <button type="submit" class="btn"></button>
              <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<header class="main-header sticky-top">
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top"> -->
  <nav class="navbar navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./"><strong style="color: #562C2C; font-size: 35px;" >Tro</strong><strong style="color: rgb(0, 180, 85); font-size: 30px;">WAY</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./">Home</a>
              <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="blog">Blog/News/Radio</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about">About Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="offices">Our Offices</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="finance">Sell a Recyclable or Make a Payment</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="faqs">FAQs</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact">Contact Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="dashboard">My Dashboard</a>
            </li>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Change Language
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">Igbo</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="">Yoruba</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="">Hausa</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="">Pidgin English</a>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto"> 
                <?php
                    if(isset($_SESSION['user']) or isset($_SESSION['admin'])){
                        echo '<li class="nav-item active">
                                  <a class="nav-link" href="logout">Logout</a>
                            </li>';
                    }
                    else {
                      echo '<li class="nav-item active">
                              <a class="nav-link" href="login">Login</a>
                        </li>';
                    }
                ?>
            <ul>
              
          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn myBtn my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>

    </div>
  </nav>
</header>
<br/>


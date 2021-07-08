<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html amp lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/image/marthoma.png'); ?>" />
    <script async src="https://cdn.ampproject.org/v0.js"></script>

    <script type="application/ld+json">
    {

        "image": [
            "logo.jpg"
        ]
    }
    </script>
    <style amp-custom>
    #lap_mtcst {
        display: block;
    }

    #mobile_mtcst {
        display: none;
    }
    html{
        scroll-behavior:smooth;
    }
    @media all and (max-width:499px) {
        #mobile_mtcst {
            display: block;
        }

        #lap_mtcst {
            display: none;
        }
    }

    nav {
        background-color: #6789A9;

    }

    .new_bg {
        background-color: white;
        filter: blur(0px);

    }
    .font_new
    {
        color:white;
    }

    .card-img-overlay {
        background: #0005;

    }
    .search-input::placeholder {
    color: white !important;
    opacity: .6 !important;
    }

    .typewrite-h1,.typewrite {
        height:100%;
    }
    .font-big{
        font-size:70px;
        text-align:center;
    }
    .carousel-wrap {
  margin: 90px auto;
  padding: 0 5%;
  width: 80%;
  position: relative;
}

/* fix blank or flashing items on carousel */
.owl-carousel .item {
  position: relative;
  z-index: 100; 
  -webkit-backface-visibility: hidden; 
}

/* end fix */
.owl-nav > div {
  margin-top: -26px;
  position: absolute;
  top: 50%;
  color: #cdcbcd;
}

.owl-nav i {
  font-size: 52px;
}

.owl-nav .owl-prev {
  left: -30px;
}

.owl-nav .owl-next {
  right: -30px;
}
    </style>
    <title>MTCST</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5.11.2/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.3.1/css/bootstrap.min.css'); ?>">
</head>

<body>



















    <!-- We will put our React component inside this div. -->
    <div id="header"></div>
    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="<?php echo base_url('assets/bootstrap-4.3.1/js/bootstrap.min.js'); ?>"></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>

    <!-- Load our React component. -->
    <script type="text/babel">
        'use strict';
        class Welcome extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
 

                }
            }
            render(){
                return (<div>

    <nav className="navbar navbar-expand-lg navbar-light sticky-top">
        <div className="row p-0 m-0 col-md-2 col-8" href="#">
        <div className="col-3 ">
            <img src="<?php echo base_url('assets/image/logo_crop.png');?>" className="pt-0 m-0" style={{width:"36px",height:"37px"}} />
        </div>
            <div className="text-white h4 pt-1 pl-1 col-6 custom-font"> MTCST</div>
        </div>
        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul className="navbar-nav  ">
                <li className="nav-item active">
                    <a className="nav-link text-white custom-font" href="#">Home <span className="sr-only">(current)</span></a>
                </li>
                <li className="nav-item mr-3">
                    <a className="nav-link text-white custom-font" href="<?php echo base_url('Home/login'); ?>">Login</a>
                </li>

            </ul>
            <form className="form-inline my-2 my-lg-0" >
                <input className="form-control mr-sm-2 search-input" style={{background: "none"}} type="search" placeholder="Search..." aria-label="Search" />
                <button className="btn btn-outline-light my-2 my-sm-0 custom-search-outline" type="submit"><i className="fas fa-search custom-search"></i></button>
            </form>
        </div>
    </nav>


    <div className=" col-12 p-0 m-0 view ">
    <amp-img height="85" width="200" className="col-12 p-0 m-0" id="lap_mtcst" src="<?php echo base_url('assets/image/mtcst_cloud.jpeg') ?>"
            alt="marthoma college of science and technology ayur" layout="responsive"></amp-img>
        <amp-img height="155" width="100" className="col-12 p-0 m-0" id="mobile_mtcst"
            src="<?php echo base_url('assets/image/mtcst_cloud_mobile.jpeg') ?>"
            alt="marthoma college of science and technology ayur" layout="responsive"></amp-img>
            <div className="card-img-overlay card-inverse">
            <h1 className="typewrite-h1">
                <a  className="typewrite text-white d-flex justify-content-center align-items-center" data-period="2000" data-type='[ "Mar Thoma College of Science and Technology","The Best College for Good Education" ]'>
                    <span className="wrap"></span>
                </a>
            </h1>  
          </div>

    </div>


    <div className="ml-4 mr-4 row mt-5 pt-4 ">
                <div className="col-md-3 col-12 pt-3" style={{height:"300px"}}><div className="col-12 h-100 border-primary border rounded shadow">
                    <div style={{height:"140px"}} className="col-12 d-flex align-items-center justify-content-center"><i className="fas fa-user-graduate font-big"></i></div>
                    <div className="col-12 d-flex align-items-center justify-content-center h2">Course</div>
                    <div className="col-12 text-center">We have a 8+ courses currently available now.</div>
                </div></div>
                <div className="col-md-3 col-12 pt-3" style={{height:"300px"}}><div className="col-12 h-100 border-primary border rounded shadow">
                    <div style={{height:"140px"}} className="col-12 d-flex align-items-center justify-content-center"><i className="fas fa-graduation-cap font-big"></i></div>
                    <div className="col-12 d-flex align-items-center justify-content-center h2">Department</div>
                    <div className="col-12 text-center">We have a 8+ courses currently available now.</div>
                </div></div>
                <div className="col-md-3 col-12 pt-3" style={{height:"300px"}}><div className="col-12 h-100 border-primary border rounded shadow">
                    <div style={{height:"140px"}} className="col-12 d-flex align-items-center justify-content-center"><i className="fas fa-photo-video font-big"></i></div>
                    <div className="col-12 d-flex align-items-center justify-content-center h2">Gallery</div>
                    <div className="col-12 text-center">We have a 8+ courses currently available now.</div>
                </div></div>
                <div className="col-md-3 col-12 pt-3" style={{height:"300px"}}><div className="col-12 h-100 border-primary border rounded shadow">
                    <div style={{height:"140px"}} className="col-12 d-flex align-items-center justify-content-center"><i className="fas fa-university font-big"></i></div>
                    <div className="col-12 d-flex align-items-center justify-content-center h2">About us</div>
                    <div className="col-12 text-center">We have a 8+ courses currently available now.</div>
                </div></div>
    </div>

    <div className="row col-12 border border-primary mt-5 pt-5">
        <div className="col-12 h2">Our Achivements</div>
        <div className="carousel-wrap">
            <div className="owl-carousel">
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
                <div className="item"><img src="http://placehold.it/150x150" /></div>
            </div>
        </div>
    </div>


    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </div>
                );
            }
        }
        
        ReactDOM.render(<Welcome />, document.querySelector('#header'));
    </script>
    <script>
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 2) {
            $(".navbar").addClass("new_bg");
            $(".custom-font").removeClass("text-white");
            $(".custom-font").addClass("text-black");
            $(".custom-search").addClass("text-dark");
            $(".custom-search-outline").removeClass("btn-outline-light");
            $(".custom-search-outline").addClass("btn-outline-dark");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".navbar").removeClass("new_bg");
            $(".custom-font").addClass("text-white");
            $(".custom-font").removeClass("text-black");
            $(".custom-search").removeClass("text-dark");
            $(".custom-search").addClass("text-light");
            $(".custom-search-outline").removeClass("btn-outline-dark");
            $(".custom-search-outline").addClass("btn-outline-light");
        }
    });

    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
</body>

</html>
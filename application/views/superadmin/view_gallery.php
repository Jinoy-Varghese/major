<style>
    .thumb {
        margin-bottom: 30px;
    }

    .page-top {
        margin-top: 85px;
    }


    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }


    .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }
        .content-item {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    transition: 0.4s;
    }
    .content-item:hover {
    transform: translate(0, -3px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }
    .a_tag_change
    {
        cursor: context-menu;
        color: inherit;
    }
    .a_tag_change:hover
    {
        cursor: context-menu;
        text-decoration: none;
    }
</style>
<div class="container p-lg-4 ">
<nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Gallery
            </li>
        </ol>
    </nav>
        <div className="row col-12 mt-5 pt-5 ml-0 pb-4 border">
            <div class="container mt-5">
                <div class="row">
                    
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox" target="_blank" >
                            <img  src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="" />
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
</div>
<script>
$(document).ready(function() {
        $(".zoom").hover(function() {
            $(this).addClass('transition');
        }, function() {
            $(this).removeClass('transition');
        });
    });
    </script>
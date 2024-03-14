@extends('frontend.layout.master')
@section('content')

<div class="fp__menu_cart_area">
    <div class="fp__menu_cart_boody">
        <div class="fp__menu_cart_header">
            <h5>total item (05)</h5>
            <span class="close_cart"><i class="fal fa-times"></i></span>
        </div>
        <ul>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu8.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Hyderabadi Biryani </a>
                    <p class="size">small</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$99.00 <del>$110.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu4.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Chicken Masalas</a>
                    <p class="size">medium</p>
                    <span class="extra">7up</span>
                    <p class="price">$70.00</p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu5.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Competently Supply Customized Initiatives</a>
                    <p class="size">large</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$120.00 <del>$150.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu6.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Hyderabadi Biryani</a>
                    <p class="size">small</p>
                    <span class="extra">7up</span>
                    <p class="price">$59.00</p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu1.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Competently Supply</a>
                    <p class="size">medium</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$99.00 <del>$110.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
        </ul>
        <p class="subtotal">sub total <span>$1220.00</span></p>
        <a class="cart_view" href="cart_view.html"> view cart</a>
        <a class="checkout" href="check_out.html">checkout</a>
    </div>
</div>

<!--=============================
book table
==============================-->
<div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Book a Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="fp__reservation_form">
                        <input class="reservation_input" type="text" placeholder="Name">
                        <input class="reservation_input" type="text" placeholder="Phone">
                        <input class="reservation_input" type="date">
                        <select class="reservation_input" id="select_js">
                            <option value="">select time</option>
                            <option value="">08.00 am to 09.00 am</option>
                            <option value="">10.00 am to 11.00 am</option>
                            <option value="">12.00 pm to 01.00 pm</option>
                            <option value="">02.00 pm to 03.00 pm</option>
                            <option value="">04.00 pm to 05.00 pm</option>
                        </select>
                        <select class="reservation_input" id="select_js2">
                            <option value="">select person</option>
                            <option value="">1 person</option>
                            <option value="">2 person</option>
                            <option value="">3 person</option>
                            <option value="">4 person</option>
                            <option value="">5 person</option>
                        </select>
                        <button type="submit">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=============================
    MENU END
==============================-->


<!--=============================
    BANNER START
==============================-->
@include('frontend.home.component.slider')
<!--=============================
    BANNER END
==============================-->


<!--=============================
    WHY CHOOSE START
==============================-->
@include('frontend.home.component.why-chose')
<!--=============================
    WHY CHOOSE END
==============================-->


<!--=============================
    OFFER ITEM START
==============================-->
@include('frontend.home.component.offer-item')

<!-- CART POPUT START -->
@include('frontend.home.component.popup')
<!-- CART POPUT END -->
<!--=============================
    OFFER ITEM END
==============================-->
@include('frontend.home.component.offer-item')

<!--=============================
    MENU ITEM START
==============================-->
@include('frontend.home.component.menu-item')
<!--=============================
    MENU ITEM END
==============================-->


<!--=============================
    ADD SLIDER START
==============================-->
@include('frontend.home.component.add-slider')
<!--=============================
    ADD SLIDER END
==============================-->


<!--=============================
    TEAM START
==============================-->
@include('frontend.home.component.team')

<!--=============================
    TEAM END
==============================-->

<!--=============================
    DOWNLOAD APP START  
==============================-->
@include('frontend.home.component.app-downlaod')
<!--=============================
    DOWNLOAD APP END
==============================-->


<!--=============================
   TESTIMONIAL  START
==============================-->
@include('frontend.home.component.tesmonial')
<!--=============================
    TESTIMONIAL END
==============================-->


<!--=============================
    COUNTER START
==============================-->
@include('frontend.home.component.start-count')
<!--=============================
    COUNTER END
==============================-->


<!--=============================
    BLOG 2 START
==============================-->
@include('frontend.home.component.blog-start')
<!--=============================
    BLOG 2 END
==============================-->

@endsection
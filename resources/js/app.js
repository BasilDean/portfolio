import './bootstrap';
import $ from 'jquery';
$( document ).ready(function() {
    $('.siteHeader__burger .hamburger').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $('#mobileMenu').toggleClass('opened');
    })
});

@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end -->
<!-- Search start -->
@include('includes.search')
<!-- Search End -->


<style>
   *{
    padding:0;
    margin:0;
    /*height:auto;*/

   }
</style>



@endsection
@push('scripts')
<script>

$(document).ready(function() {
    // Check if the element exists before initializing Slick
    if ($('.mian_slider').length) {
        $('.mian_slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true
        });
    }
});

    $(document).ready(function ($) {
        
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $('#profileEdit a').click(function (evt) {
            evt.preventDefault();
            $(this).tab('show');
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        })
    });
if (typeof faq_button === 'undefined') {
  const faq_button = document.querySelectorAll('.faq-button');

  faq_button.forEach( (singleButton) => {
    singleButton.addEventListener("click", () => {
        singleButton.classList.toggle("mystyle");
    });
  });
}

// $('.tab-pane').hover(function() {
//     clearInterval(tabCycle);
// }, function() {
//     tabCycle = setInterval(tabChange, 5000);
// });

// var tabCycle = setInterval(tabChange, 5000);

// $(function(){
//     $('.nav-tabs a').click(function(e) {
//         e.preventDefault();
//         clearInterval(tabCycle);
//         $(this).tab('show')
//         tabCycle = setInterval(tabChange, 5000);
//     });
// });

// profile cv generate



</script>





@include('includes.footer')
@include('includes.country_state_city_js')
@endpush

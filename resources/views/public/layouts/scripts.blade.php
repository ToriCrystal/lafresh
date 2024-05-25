<script src="{{ asset('public/assets/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('public/libs/tabler/dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery-ui.1.12.1.js') }}"></script>
<script defer src="{{ asset('public/libs/tabler/litepicker/dist/litepicker.js') }}"></script>
{{-- <script defer src="{{ asset('public/libs/tabler/dist/fslightbox/index.js') }}"></script> --}}
<script src="{{ asset('public/libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
<script src="{{ asset('public/libs/Parsley.js-2.9.2/parsley.min.js') }}"></script>
<script src="{{ asset('public/libs/swiper/js/swiper.min.js') }}"></script>
<script src="{{ asset('public/libs/fancybox/js/fancybox.umd.js') }}"></script>
<script defer src="{{ asset('libs/owlcarousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/public/libs/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js') }}"></script>


@stack('libs-js')

{{-- <script type="module" src="{{ asset('public/admins/assets/js/i18n.js') }}"></script> --}}
<script src="{{ asset('public/assets/js/scripts.js') }}"></script>
<script src="{{ asset('public/admins/assets/js/setup.js') }}"></script>

<x-input type="hidden" name="route_product_search" :value="route('product.search')" />

<script>
    $(document).on('keyup', '#inputSearchProduct', $.debounce(1000, function(e) {
        var url = $('input[name="route_product_search"]').val();

        $.ajax({
            type: "GET",
            url: url,
            data: {
                keyword: $(this).val()
            },
            success: function(response) {
                $("#resultSearchProduct").html(response);
            },
            error: function(response) {
                handleAjaxError(response);
            }
        })
    }))
</script>


@stack('custom-js')

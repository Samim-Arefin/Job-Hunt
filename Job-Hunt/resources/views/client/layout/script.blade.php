<script src="{{ asset('/client/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('/client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/client/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/client/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/client/js/wow.min.js') }}"></script>
<script src="{{ asset('/client/js/select2.full.js') }}"></script>
<script src="{{ asset('/client/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('/client/js/moment.min.js') }}"></script>
<script src="{{ asset('/client/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('/client/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('/client/js/iziToast.min.js') }}"></script>
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

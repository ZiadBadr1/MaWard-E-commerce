<!-- BEGIN BASE JS -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/popper.js/umd/popper.min.js')}}'"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script> <!-- END BASE JS -->
<!-- BEGIN PLUGINS JS -->
<script src="{{asset('assets/vendor/particles.js/particles.js')}}"></script>
<script>
    /**
     * Keep in mind that your scripts may not always be executed after the theme is completely ready,
     * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
     */
    $(document).on('theme:init', () =>
    {
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('auth-header', 'assets/javascript/pages/particles.json');
    })
</script> <!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script src="{{asset('assets/javascript/theme.js')}}"></script> <!-- END THEME JS -->
</body>
</html>

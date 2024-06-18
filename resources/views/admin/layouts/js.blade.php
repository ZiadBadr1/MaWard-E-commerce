<!-- BEGIN BASE JS -->

<script src="{{asset('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/bootstrap/js/bootstrap.min.js')}}"></script> <!-- END BASE JS -->
<!-- BEGIN PLUGINS JS -->
<script src="{{asset('assets/dashboard/vendor/pace-progress/pace.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/stacked-menu/js/stacked-menu.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('assets/dashboard/vendor/chart.js/Chart.min.js')}}"></script> <!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script src="{{asset('assets/dashboard/javascript/theme.min.js')}}"></script> <!-- END THEME JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{asset('assets/dashboard/javascript/pages/dashboard-demo.js')}}"></script> <!-- END PAGE LEVEL JS -->
{{--Tiny-MCE --}}
<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',

});
</script>
{{--Helpers --}}
<script src="{{asset('assets/dashboard/javascript/Helpers/Helpers.js')}}"></script>
{{--DON'T ADD ANY SCRIPTS AFTER THIS LINE--}}
@yield('pre-scripts')
</body>

</html>
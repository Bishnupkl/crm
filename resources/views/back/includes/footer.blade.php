@section('footer')
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2018 &copy; Grace CRM by Technorio.
        <a href="http://technorio.com" title="Technorio" target="_blank">Technorio</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    <!-- END FOOTER -->
    <!--[if lt IE 9]-->
    <script src="{{URL::to('assets/global/plugins/respond.min.js')}}"></script>
    <script src="{{URL::to('assets/global/plugins/excanvas.min.js')}}"></script>
    <!--[endif]-->

    <!--STARTED VUE-->
    <script src="{{ asset('js/app.js') }}"></script>

<!--END VUE-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{URL::to('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/pages/scripts/form-dropzone.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>

<!-- END CORE PLUGINS -->

<!-- Select 2 validation-->
<script src="{{URL::to('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
<!-- Select 2 validation -->

<!-- START DATA TABLE PLUGINS -->
<script src="{{URL::to('assets/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('assets/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::to('assets/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- END DATA TABLE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{URL::to('assets/global/scripts/app-main.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{URL::to('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{URL::to('assets/pages/scripts/form-wizard.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN WYSIHTML PLUGINS -->
    <script src="{{URL::to('assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>
    <!-- END WYSIHTML PLUGINS -->

    <!-- Datepicker -->
    <script src='bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
    <!-- Date-picker end -->
    <script src="{{URL::to('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

    @include('back.includes.modal-tab-control')


<script src="{{URL::to('js/style.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true,
            searching: false, paging: false
        });
    });
</script>

</body>
</html>
@endsection

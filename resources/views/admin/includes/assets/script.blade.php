<script src="{{ asset('/') }}admin-assets/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}admin-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}admin-assets/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('/') }}admin-assets/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('/') }}admin-assets/assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{ asset('/') }}admin-assets/assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="{{ asset('/') }}admin-assets/assets/js/pages/dashboard.init.js"></script>

<script src="{{ asset('/') }}admin-assets/assets/js/app.js"></script>


{{--toastr js--}}

<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('message'))
    <script>
        toastr.success("{{ Session::get('message') }}");
    </script>
@endif


<!-- For More Data Taginput ---->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script>
    $(function () {
        $('input')
            .on('change', function (event) {
                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput')) return;

                var val = $element.val();
                if (val === null) val = 'null';
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(
                    $.isArray(val)
                        ? JSON.stringify(val)
                        : '"' + val.replace('"', '\\"') + '"'
                );
                $('code', $('pre.items', $container)).html(
                    JSON.stringify($element.tagsinput('items'))
                );
            })
            .trigger('change');
    });
</script>

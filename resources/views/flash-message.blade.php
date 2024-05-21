
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.options.timeOut = 10000;
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':

                toastr.options.timeOut = 10000;
                toastr.success("{{ Session::get('message') }}");
               

                break;
            case 'warning':

                toastr.options.timeOut = 10000;
                toastr.warning("{{ Session::get('message') }}");
               

                break;
            case 'error':

                toastr.options.timeOut = 10000;
                toastr.error("{{ Session::get('message') }}");
               

                break;
        }
    @endif
</script>
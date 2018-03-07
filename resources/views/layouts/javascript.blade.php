<!-- jQuery -->
{{ Html::script('js/jquery-3.1.1.min.js') }}
<!-- Bootstrap -->
{{ Html::script('bootstrap/js/bootstrap.min.js') }}
<!-- Datepicker Script -->
{{ Html::script('js/jquery-ui.js') }}
<!-- datatable -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<!-- JavaScript -->
{{ Html::script('js/script.js') }}

<script>
    $( document ).ready(function() {
        $('#flash_messages').not('.alert-important').delay(3000).slideUp(300);
    });

</script>
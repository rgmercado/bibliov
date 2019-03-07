<!-- Required JavaScript Libraries -->
<script src="{!! asset('belltheme/lib/jquery/jquery.min.js') !!}"></script>
<script>
    $(document).ready(function(){
        $('.custom-file-input').on('change', function(){
           var nombreEjemp = $(this).val();
           $(this).next('.custom-file-label').html(nombreEjemp);
       });
   });
</script>

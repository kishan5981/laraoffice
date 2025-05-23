<script>
    "use strict";
        $(document).on('click','#selectbtn-widgets',function(){
        $("#selectall-widgets > option").prop("selected","selected");
        $("#selectall-widgets").trigger("change");
    });
    
        $(document).on('click','#deselectbtn-widgets',function(){
        $("#selectall-widgets > option").prop("selected","");
        $("#selectall-widgets").trigger("change");
    });
</script>   
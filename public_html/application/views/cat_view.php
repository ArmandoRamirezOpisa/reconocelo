<div class="container-fluid mt-4">
    <div id="dvContAw" class="col-md-12"></div>
</div>
<script>
    var dAct = "a1";
    function selCat(idCat,id)
    {
        $("#"+dAct).removeClass("active");
        dAct = id;
        $("#"+id).addClass("active");
       loadSection('cart_controller/getAwards/'+idCat,'dvContAw');
    }
    loadSection('cart_controller/getAwards/1','dvContAw');
    up();
    
    function up()
    {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    }
    
    $("#selProd").change(function(){
        selCat($("#selProd").val(),1);
    });
</script>
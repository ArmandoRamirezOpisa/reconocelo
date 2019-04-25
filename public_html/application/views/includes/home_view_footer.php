        <div id="footerReconocelo" class="row mt-5 fixed-bottom justify-content-center">
            <div class="col-auto " id="footer">
                <a id="avisoReconocelo" href="javascript:void(0)" onclick="loadSection('home/avisoPrivacidad', 'dvSecc')" class="linkPrivacy"> <i class="fas fa-flag"></i> Aviso de privacidad</a>
                <a id="ayudaReconocelo" href="javascript:void(0)" onclick="loadSection('home/ayuda', 'dvSecc')" class="linkPrivacy"> <i class="fas fa-question-circle"></i> Ayuda</a>
            </div>
        </div>
        <a id="irHomeReconocelo" href="#homeReconocelo" class="move-top">
            <i class="fas fa-arrow-circle-up"></i>
        </a>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="assets/js/functions.js?abc"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            loadSection("home/getAwards/1","dvSecc");

            /*$(function(){
                $('#dropdownMenuButton').bind('mouseover', function(){
                    console.log('abriendo menu');
                    $('#categoriasReconocelo').addClass('show');
                }).bind('mouseout', function(){
                    console.log('Cerrando menu');
                    $('#categoriasReconocelo').removeClass('show');
                })
            });*/


            $( document ).ready(function() {

                document.getElementById("irHomeReconocelo").style.display = "none";

                if(contOrder.length == 0){
                    $('#numeroCarrito').html(contOrder.length);
                }else{
                    $('#numeroCarrito').html('<strong>'+contOrder.length+'</strong>');
                }

            });

            $(window).scroll(function(event){

                var st = $(this).scrollTop();
                if(st == 1 || st == 0){
                    document.getElementById("irHomeReconocelo").style.display = "none";
                }else{
                    document.getElementById("irHomeReconocelo").style.display = "inline";
                }

            });
        </script>
    </body>
</html>
    
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="text-center">Copyright © <?=date('Y')?> classifiedintelligencebrief.com. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-4 col-md-3 col-lg-3 col-lx-2">
                        <div class="logo-footer"><?=get_custom_logo()?></div>
                        <div class="navigation-footer">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer-menu',
                                    'menu_id' => 'footer-menu',
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-lx-10">
                        <p>HIGH RISK WARNING</p>
                        <p class="text-justify">Trading foreign exchange, stocks, options, or futures on margin carries a high level of risk, and may not be suitable for all investors. Before deciding to trade, you should carefully consider your objectives, financial situation, needs and level of experience. Classified Intelligence Brief provides general advice that does not take into account your objectives, financial situation or needs. The content of this website must not be construed as personal advice. The possibility exists that you could sustain a loss in excess of your deposited funds and therefore, you should not speculate with capital that you cannot afford to lose. You should be aware of all the risks associated with trading on margin.You should seek advice from an independent financial advisor. Past performance is not necessarily indicative of future success.</p>
                        <p>101 Marketside Ave. Suite 404 PMB 318 Ponte Vedra, FL 32081  |  (321) 325-1551</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>

        <?=(file_exists($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/classifiedintelligencebrief/vendor/twbs/bootstrap/dist/js/bootstrap.min.js'))?'<script src="'.get_template_directory_uri().'/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>':'<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';?>

        <?=(file_exists($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/classifiedintelligencebrief/vendor/fortawesome/font-awesome/js/all.min.js'))?'<script src="'.get_template_directory_uri().'/vendor/fortawesome/font-awesome/js/all.min.js"></script>':'<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>';?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(document).ready(function(){ 
                if($('.gsweb-hellobar-rogueinvesting').length > 0){
                    $("body").addClass("gsweb-hellobar-rogueinvesting-active"); 
                    $(".close-gsweb-hellorbar-rogueinvesting").click(function(){ 
                        $("body").removeClass("gsweb-hellobar-rogueinvesting-active"); 
                        $(".gsweb-hellobar-rogueinvesting").css("top","-80px"); 
                    }); 
                }
            });
        </script>
        <script async src="<?=get_template_directory_uri()?>/js/menu.js"></script>
    </body>
</html>
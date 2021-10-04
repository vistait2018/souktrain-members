 <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
<!-- footer content -->
        <footer>
          <div class="pull-right" >
            <span class="footer copyright">St-WEB. Powered by <a href="#">NetronIT&copy2017</a></span>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery.min.js') ;?>"></script>
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js') ;?>"></script>
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/bootstrap/bootstrap.min.js');?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="<?php print base_url('assets/js/plugins/icheck/icheck.min.js') ;?>"></script>        
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ;?>"></script>
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/scrolltotop/scrolltopcontrol.js') ;?>"></script>
        
        <script type="text/javascript" src="<?php print base_url('assets/plugins/morris/raphael-min.js') ;?>"></script>
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>       
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/rickshaw/d3.v3.js') ;?>"></script>
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/rickshaw/rickshaw.min.js') ;?>"></script>
        <script type='text/javascript' src="<?php print base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ;?>"></script>
        <script type='text/javascript' src="<?php print base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ;?>"></script>                
        <script type='text/javascript' src="<?php print base_url('assets/js/plugins/bootstrap/bootstrap-datepicker.js') ;?>"></script>                
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/owl/owl.carousel.min.js') ;?>"></script>                 
        
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/moment.min.js') ;?>"></script>
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins/daterangepicker/daterangepicker.js') ;?>"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php print base_url('assets/js/settings.js') ;?>"></script>
        
        <script type="text/javascript" src="<?php print base_url('assets/js/plugins.js') ;?>"></script>        
        <script type="text/javascript" src="<?php print base_url('assets/js/actions.js') ;?>"></script>
        
        <script type="text/javascript" src="<?php print base_url('assetsjs/demo_dashboard.js') ;?>"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({
                        id:25836617,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "../../../../mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->    
    </body>

    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                <div class="footer-col col-md-3 col-sm-4 about">
                    <div class="footer-col-inner">
                        <h3>About</h3>
                        <ul>
                            <li><a href="about.html"><i class="fa fa-caret-right"></i>About us</a></li>
                            <li><a href="contact.html"><i class="fa fa-caret-right"></i>Contact us</a></li>
                            <li><a href="privacy.html"><i class="fa fa-caret-right"></i>Privacy policy</a></li>
                            <li><a href="terms-and-conditions.html"><i class="fa fa-caret-right"></i>Terms &amp; Conditions</a></li>
                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col col-md-6 col-sm-8 newsletter hidden-xs hidden-sm">
                    <div class="footer-col-inner">
                        <h3>Join our mailing list</h3>
                        <p>Subscribe to get our weekly newsletter delivered directly to your inbox</p>
                        <form class="subscribe-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <input class="btn btn-theme btn-subscribe" type="submit" value="Subscribe">
                        </form>
                        
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col--> 
                <div class="footer-col col-md-3 col-sm-12 contact">
                    <div class="footer-col-inner">
                        <h3>Contact us</h3>
                        <div class="row">
                            <p class="adr clearfix col-md-12 col-sm-4">
                                <i class="fa fa-map-marker pull-left"></i>        
                                <span class="adr-group pull-left">       
                                    <span class="street-address">College Green</span><br>
                                    <span class="region">56 College Green Road</span><br>
                                    <span class="postal-code">BS16 AP18</span><br>
                                    <span class="country-name">UK</span>
                                </span>
                            </p>
                            <p class="tel col-md-12 col-sm-4"><i class="fa fa-phone"></i>0800 123 4567</p>
                            <p class="email col-md-12 col-sm-4"><i class="fa fa-envelope"></i><a href="#">enquires@website.com</a></p>  
                        </div> 
                    </div><!--//footer-col-inner-->            
                </div><!--//foooter-col-->   
                </div>   
            </div>        
        </div><!--//footer-content-->        
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript">
      $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip({
                    'delay': { show: 100, hide: 300 }
               });  
             $('[data-toggle="popover"]').popover({
               'trigger': 'hover',
               'placement': 'top',
               'html':'true'
            }); 
             $('.add_to_cart').click(function(){
                $.post(
                      "<?=base_url();?>index.php/ajax/add_item",
                      {
                        id: this.getAttribute('data-id'),
                        name: this.getAttribute('data-name'),
                        qty: this.getAttribute('data-qty'),
                        price: this.getAttribute('data-price')
                      },
                      onAjaxSuccess
                    );
                     
                    function onAjaxSuccess(data)
                    {
                      // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                        $('.cart_amount').addClass("text-success");
                        $('#cart_amount').text(data);
                        setTimeout(function(){
                            $('.cart_amount').toggleClass('text-success text-muted');
                        }, 2000);
                      //#9d9d9d
                    }
             })
         });
    </script>
</body>

</html>
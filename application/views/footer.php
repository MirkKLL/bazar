
<footer class="footer">
  <div class="footer-content">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-3 col-sm-4 about">
          <div class="footer-col-inner">
            <h3>Vkysnee.NET</h3>
            <ul>
              <li><a href="<?=site_url()?>"><i class="fa fa-caret-right"></i>Главная</a></li>
              <li><a href="<?=site_url()?>delivery"><i class="fa fa-caret-right"></i>Оплата и доставка</a></li>
              <li><a href="<?=site_url()?>news"><i class="fa fa-caret-right"></i>Новости</a></li>
            </ul>
          </div><!--//footer-col-inner-->
        </div><!--//foooter-col-->
        <div class="footer-col col-md-6 col-sm-8 newsletter hidden-xs hidden-sm">
          <div class="footer-col-inner">
            <h3>Новости:</h3>

          </div><!--//footer-col-inner-->
        </div><!--//foooter-col--> 
        <div class="footer-col col-md-3 col-sm-12 contact">
          <div class="footer-col-inner">
            <h3>Контакты</h3>
            <div class="row">
              <p class="adr clearfix col-md-12 col-sm-4">
                <i class="fa fa-map-marker pull-left"></i>        
                <span class="adr-group pull-left">       
                  <span class="street-address">г.Харьков</span><br>
                  <span class="region">пр. Ленина 60</span><br>
                </span>
              </p>
              <p class="tel col-md-12 col-sm-4"><i class="fa fa-phone"></i>(093) 878-71-72</p>
              <p class="email col-md-12 col-sm-4"><i class="fa fa-envelope"></i><a href="#">support@vkysnee.net</a></p>  
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
        price: this.getAttribute('data-price'),
        measure: this.getAttribute('data-measure'),
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
   $('.update_price').change(update_price);
   $('.update_expire').change(update_expire);
   $('.update_prod_date').change(update_prod_date);
   $('.update_active').change(update_active);

 });

function set_changed () {
  $('#changed').val("yes");
}

//google nalystic
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-60417888-1', 'auto');
ga('send', 'pageview');
//end google analystic
 
//start reformal   
    var reformalOptions = {
        project_id: 851469,
        project_host: "vkysneeNet.reformal.ru",
        tab_orientation: "right",
        tab_indent: "50%",
        tab_bg_color: "#F05A00",
        tab_border_color: "#FFFFFF",
        tab_image_url: "http://tab.reformal.ru/T9GC0LfRi9Cy0Ysg0Lgg0L%252FRgNC10LTQu9C%252B0LbQtdC90LjRjw==/FFFFFF/a08a7c60392f68cb33f77d4f56cf8c6f/right/1/tab.png",
        tab_border_width: 2
    };
    
    (function() {
        var script = document.createElement('script');
        script.type = 'text/javascript'; script.async = true;
        script.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'media.reformal.ru/widgets/v3/reformal.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    })();
//end reformal
</script><noscript><a href="http://reformal.ru"><img src="http://media.reformal.ru/reformal.png" /></a>
<a href="http://vkysneeNet.reformal.ru">Oтзывы и предложения для Vkysnee.Net</a></noscript>
</body>

</html>
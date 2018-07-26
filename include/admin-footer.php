</div>
<div style="background-color:#171717; width:100%; height:auto; padding-bottom:30px; margin-bottom:0px;">
<div class="container">
<div class="footer-main">
<div class="copy-right">
<p>© 2018 Impressive Hotel. All rights reserved</p>
</div>

<script type="text/javascript">
$(document).ready(function () {
$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>



<script type="text/javascript">
  $(function () {
    $("#dateSelector").datepicker({
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        minDate: "dateToday"
     });
    var date = new Date(2008,9,3);
    $("#dateSelector").datepicker("setDate", date);
});
</script>


<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
</div>
</div> 

<script type="text/javascript">
	function mask(textbox, e) {

      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode == 46 || charCode > 31&& (charCode < 48 || charCode > 57)) 
         {
            alert("Only Numbers Allowed");
            return false;
         }
     else
         {
             return true;
         }
       }

</script>
<!--footer end here-->
</body>
</html>
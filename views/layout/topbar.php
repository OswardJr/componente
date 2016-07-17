<header class="main-header">
  <a href="<?php echo Conectar::ruta()?>" class="logo">
    <!-- LOGO -->
    <img src="public/img/jol.png" width="150" height="50">
  </a>
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right" style="color:white;">
        <li style="margin-left:5px;margin-top:10%;">
            <script type="text/javascript">
    //<![CDATA[
    var date = new Date();
    var d  = date.getDate();
    var day = (d < 10) ? '0' + d : d;
    var m = date.getMonth() + 1;
    var month = (m < 10) ? '0' + m : m;
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    document.write(day + "/" + month + "/" + year)

    //]]>
  </script>

</li>
<li id="reloj" style="margin-left:5px;margin-top:10%;"><script type="text/javascript">
  function startTime(){
    today=new Date();
    h=today.getHours();
    m=today.getMinutes();
    s=today.getSeconds();
    m=checkTime(m);
    s=checkTime(s);
    document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
    t=setTimeout('startTime()',500);}
    function checkTime(i)
    {if (i<10) {i="0" + i;}return i;}
    window.onload=function(){startTime();}
  </script></li>
<li style="margin-right:10px;"></li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</header>

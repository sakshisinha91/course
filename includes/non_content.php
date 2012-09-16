<div id="h" style="min-height:60px">
    <div class="container">
        <div id="logo">
        
        </div>
    </div>
</div>
<div style="clear:both;display:block"></div>
<div id="ht">
    <ul>
        <li>
           <a href="">
             <span>Area of interest</span>
           </a>
        </li>
                <li>
           <a href="">
             <span>Area of interest</span>
           </a>
        </li>
                <li>
           <a href="">
             <span>Area of interest</span>
           </a>
        </li>
                <li>
           <a href="">
             <span>Area of interest</span>
           </a>
        </li>
    </ul>
</div>
<div id="ha">
     <div id="lpl"></div>
     <div id="lpm">
        <div id="links">
          <a href="#">About us</a> | 
          <a href="#">Contact us</a>
        </div>
     </div>
     <div id="lpr"></div>     
</div>
<div id="hhb">
   <div id="flash">
      Course Allocation
   </div>
</div>
<div class="menu">    
<?php
if(!checkAdmin())
{
?>

  <input type="button" onclick="window.location.href='myaccount.php'" class="item" value="Home" />
  <input type="button" onclick="window.location.href='area_of_interest.php'" class="item" value="Post area of interest" />
  <input type="button" onclick="window.location.href='view_profile.php'" class="item" value="View Profile" />
  <input type="button" onclick="window.location.href='show_allocated.php'" class="item" value="Allocated courses"  />      
  <input type="button" onclick="window.location.href='absence.php'" class="item" value="Absence / Leave" />
 <?php
}
else
{
	?>
      <input type="button" onclick="window.location.href='myaccount.php'" class="item" value="Home" />
  <input type="button" onclick="window.location.href='fac_profiles.php'" class="item" value="Faculty Profiles" />
  <input type="button" onclick="window.location.href='#'" class="item" value="Update" />


    <?php
}
?>
</div>
<div class="partition">&nbsp;
</div>
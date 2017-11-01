<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<title>Elisha Bargel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="fashion, design, student, shenkar, college, portfolio, creation, mode">
<meta name="description" content="Fashion designer Elisha Abargel: projects, pictures, contact.">
<style type="text/css">
    #flashContent { width:100%; height:100%; }
    body {background-color: #FFFFFF;}
    h1 {font-family:Cursive; color: #000000;}
    p {font-family:Cursive; font-size: 14pt; font-style: normal; font-weight: normal; color: #000000;}
    .link {color: #000000;}
    .alink {color: #000000;}
    .vlink {color: #000000;}
</style>
</head>
<body>
<form id="form1" runat="server">
    <div>
        <div id="MainTitle" style="text-align: center;"><img alt="" src="http://elishaabargel.com/photos/logo2.jpg"></div>
        <div id="MainLinks" style="text-align: center;"><a href="http://elishaabargel.com/projects.html" style="font-size: 3; font-family: 'courier new'; text-decoration: none;">projects</a> - <a href="http://elishaabargel.com/contact.html" style="font-size: 3; font-family: 'courier new'; text-decoration: none;">contact</a></div>
        <div id="LeftPanel" style="width: 800; height: 100%; float: left;">
            <h1>Denim Project</h1>
            <div id="flashContent">
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="800" height="612" id="denimproject" align="middle">
                    <param name="movie" value="http://elishaabargel.com/photos/flashgalleries/denimproject.swf" />
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="#ffffff" />
                    <param name="play" value="true" />
                    <param name="loop" value="true" />
                    <param name="wmode" value="window" />
                    <param name="scale" value="showall" />
                    <param name="menu" value="true" />
                    <param name="devicefont" value="false" />
                    <param name="salign" value="" />
                    <param name="allowScriptAccess" value="sameDomain" />
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="http://elishaabargel.com/photos/flashgalleries/denimproject.swf" width="800" height="612">
                        <param name="movie" value="http://elishaabargel.com/photos/flashgalleries/denimproject.swf" />
                        <param name="quality" value="high" />
                        <param name="bgcolor" value="#ffffff" />
                        <param name="play" value="true" />
                        <param name="loop" value="true" />
                        <param name="wmode" value="window" />
                        <param name="scale" value="showall" />
                        <param name="menu" value="true" />
                        <param name="devicefont" value="false" />
                        <param name="salign" value="" />
                        <param name="allowScriptAccess" value="sameDomain" />
                    <!--<![endif]-->
                        <a href="http://www.adobe.com/go/getflash">
                            <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                        </a>
                    <!--[if !IE]>-->
                    </object>
                    <!--<![endif]-->
                </object>
            </div>

        </div>
        <div>
        <center>
        <div class="container" style="float: right;">
        <form id="form" class="form-horizontal" method="post">
        <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="Serienummer">Serienummer</label>
            <div class="col-md-4">
                <td><input type="text" name="Serienummer" placeholder="Serienummer" value="<?php if(isset($_GET['edit'])) echo $getROW['Serienummer'];  ?>" /></td>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="ProductNaam">ProductNaam</label>
            <div class="col-md-4">
                <td><input type="text" name="ProductNaam" placeholder="ProductNaam" value="<?php if(isset($_GET['edit'])) echo $getROW['ProductNaam'];  ?>" /></td>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="Productiedatum">productiedatum</label>
            <div class="col-md-4">
                <td><input type="date" name="Productiedatum" placeholder="Productiedatum" value="<?php if(isset($_GET['edit'])) echo $getROW['Productiedatum'];  ?>" /></td>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="Productiedatum">Product of Gereedschap</label>
            <div class="col-md-4">
                    <input name='Type' type='radio' value="<?php if(isset($_GET['edit'])) echo $getROW['Product'];  ?> Product" /> Product
                    <input name='Type' type='radio' value="<?php if(isset($_GET['edit'])) echo $getROW['Gereedschap'];  ?> Gereedschap" /> Gereedschap
                </div>
            </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="comments">Opmerkingen</label>
            <div class="col-md-4">
                <td><input class="resizable-input" type="text" name="Opmerking" placeholder="Opmerking" value="<?php if(isset($_GET['edit'])) echo $getROW['Opmerking'];  ?>"/></td>
            </div>
        </div>
        <?php
        if(isset($_GET['edit'])){
         ?>
         <button type="submit" name="update">update</button>
         <?php
        }
         else{
         ?>
         <button type="submit" name="save">save</button>
         <?php
        }
        ?>
        </fieldset>
        </form>
        </div>
</div>
</form>

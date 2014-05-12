<?php $this->pageTitle = Yii::app()->name; ?>
<div class="container">
    <div class="row">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item">
                    <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span><strong><?php echo Yii::t("t","CV PAGES");?></strong></span>
                            </h2>
                            <br>
                            <br>

                            <h3>
                                <span><?php echo Yii::t("t","Ladda upp dina cv:n i vår publika CV-databas");?></span>
                            </h3>
                            
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/login"><?php echo Yii::t("t", "Logga in");?></a>
                                <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/register"><?php echo Yii::t("t", "Registrera dig");?></a></div>
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item active">
                    <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Second slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span><strong><?php echo Yii::t("t","CV PAGES");?></strong></span>
                            </h2>
                            <br>
                            <h3>
                                <span><?php echo Yii::t("t","Sök efter cv:n i databasen.");?></span></h3> 
                                    <br> 
                                    <br>
                                    <br>
                                    
                                   
                    <div class="row">
                            <div class="col-xs-6 col-md-2"></div>

                            <div class="col-xs-6 col-md-8">
                                <div class="input-group">
                                	<form action="/cv/index/" method="get"> 
                                		<input type="text" class="form-control" name="searchKey" placeholder="Sök på Nyckelord">
                                		<span class="input-group-btn">
                                			<button class="btn btn-info" type="submit"><?php echo Yii::t("t","Sök");?></button>
                                		</span>
                                	</form>	
                            	</div><!-- /input-group -->


                                
                            	<div class="col-xs-6 col-md-2">
                           
                            	</div>
                            	</div>

                        </div>
                        <br>
                            <div class="">
                               <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/cv/">Avancerad sökning</a><a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/register">Registrera dig</a></div>
                        
                    </div>
                </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Third slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span><strong><?php echo Yii::t("t","CV PAGES");?></strong></span>
                            </h2>
                            <br>
                            <br>
                            <br>
                            <h3>
                                <span><?php echo Yii::t("t","Hitta kandidater i vår CV-databas?");?></span>
                            </h3>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/login">Logga in</a><a class="btn btn-theme btn-sm btn-min-block" href="<?php echo Yii::app()->baseUrl;?>/site/register">Registrera dig</a></div>
                        </div>
                    </div><!-- /header-text -->
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div><!-- /carousel -->
    </div>
</div>

<div id="footer">
    <div class="container">
        <div class="row">
           
            <br>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains">
                  <br>
                  <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användaravtal");?></strong></h4>
                  <p class="footertext"><?php echo Yii:: t ("t", "CV-Pages är en webbplats avsedd att användas endast 
                    till jobbrekryteringar och får inte användas i andra avseenden. Detta innebär att det endast är CV:n som får laddas upp av publicerare. 
                    Vid missbruk kan ditt konto komma att stängas av. Detta beslut går inte att överklaga.");?> 
                    <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/about">Läs mer</a><br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="footertext"><strong><?php echo Yii:: t("t","Personuppgifter");?></strong></h4>
                  <p class="footertext"><?php echo Yii:: t("t","Registrering hos CV-Pages innebär att du samtycker till att CV-Pages 
                    behandlar dina personuppgifter enligt personuppgiftslagen (1998:204 PuL).<br>Som personuppgifter räknas all 
                    slags information som direkt eller indirekt kan hänföras till dig som fysisk person till exempel personnummer 
                    och adress.");?>
                    <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/about">Läs mer</a><br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="footertext"><strong><?php echo YIi:: t("t","Cookies");?></strong></h4>
                  <p class="footertext"><?php echo yii:: t("t","Vi vill meddela er att CV-Pages använder sig utav cookies.
                    Syftet med cookies är att få
                    fakta om exempelvis hur många som besöker webbplatsen, vilken webbläsare,skärmupplösning,
                    samt vilken sökmotor som används för att hitta webbplatsen o.s.v. Detta för att kunna förbättra webbplatsen");?> 
                    <br><a href="<?php echo Yii::app()->baseUrl;?>/site/page/about">Läs mer</a><br>
                </center>
              </div>
            </div>
            <div class="row">
            <p><center><br>
                <a href="<?php echo Yii::app()->baseUrl;?>/site/contact"><?php echo Yii::t("t","Kontakt");?></a><p class="footertext"></p></center></p>
        </div>
    </div>
</div>
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
                <div class="item active">
                    <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span><strong>CV PAGES</strong></span>
                            </h2>
                            <br>
                            <h4>
                                <span><strong>Vill du synas eller leta efter intressanta kandidater i vår publika CV-databas?</strong> </h4><span><br> <br>Registrera dig som</span>
                            </span>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-lg btn-min-block" href="#">Publicerare</a><a class="btn btn-theme btn-lg btn-min-block" href="#">Rekryterare</a></div>
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Second slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span><strong>CV PAGES</strong></span>
                            </h2>
                            <br>
                            <h3>
                                <span>Sök efter cv:n i databasen.</span></h3> 
                                    <br> 
                                    <br>
                                    <br>
                                    
                                   
                    <div class="row">
                            <div class="col-xs-6 col-md-2"></div>

                            <div class="col-xs-6 col-md-8">
                                <div class="input-group">
                                <input type="text" class="form-control"placeholder="Sök på Nyckelord">
                                <span class="input-group-btn">
                                <button class="btn btn-info" type="button">Sök</button>
                                </span>
                            </div><!-- /input-group -->


                                
                            <div class="col-xs-6 col-md-2">
                           
                            </div>
                            </div>

                        </div>
                        <br>
                            <div class="">
                               <a class="btn btn-theme btn-sm btn-min-block" href="#">Avancerad sökning</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Registrera dig</a></div>
                        
                    </div>
                </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Third slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>CV PAGES</span>
                            </h2>
                            <br>
                            <h3>
                                <span>Vill du synas eller leta efter intressanta kandidater i vår publika CV-databas?</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
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
<div class="container well">
    <h2><center>Web Stuff Goes Here</center></h2>
</div>
<div id="footer">
    <div class="container">
        <div class="row">
            <h3 class="footertext">About Us:</h3>
            <br>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains">
                  <br>
                  <h4 class="footertext">Programmer</h4>
                  <p class="footertext">You can thank all the crazy programming here to this guy.<br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="footertext">Artist</h4>
                  <p class="footertext">All the images here are hand drawn by this man.<br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="footertext">Designer</h4>
                  <p class="footertext">This pretty site and the copy it holds are all thanks to this guy.<br>
                </center>
              </div>
            </div>
            <div class="row">
            <p><center><a href="#">Contact Stuff Here</a> <p class="footertext">Copyright 2014</p></center></p>
        </div>
    </div>
</div>
<div class="jumbotron">
    <div class="container">
        <h1><?php echo Yii::t("t","CV-Pages");?></h1>

        <p><?php echo Yii::t("t", "Vill du synas eller leta efter intressanta kandidater i vår publika CV-databas? Då har du kommit rätt! Här kan du,
        
    söka nya jobb utan att din nuvarande arbetsgivare ser att du gör det
    hitta kandidater inom ett brett spektrum av brancher
    följa dina rekryteringsprocesser


 <br> Prova att söka i vår cv-databas nu ");?> </p>
<br>
        <p><a href="<?php echo Yii::app()->baseUrl;?>/cv" class="btn btn-primary btn-lg"><?php echo Yii::t("t","Sök efter CV");?></a> </p>
         </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Sök nytt jobb anonymt!");?></h2>

        <p><?php echo Yii::t("t"," Som Publicerare kan du själv välja vilken typ av information som du vill ge ut om dig själv. 
        I dina publicera CV:n kan du uppge ditt riktiga namn om du vill,
         men rekryteraren ser endast ditt användarnamn vilket fungerar som en psuedonym. 
         Du kan rikta cv:t till den del av världen som du är intresserad av att arbeta i. Vill du veta mer om hur anonymiteten fungerar läs mer på om oss.
");?> </p>

        <p><a href="<?php echo Yii::app()->baseUrl;?>/site/page/about/" class="btn btn-success btn-btn btn-block"><?php echo Yii::t("t","Om oss");?></a></p>
    </div>
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Rekrytera ");?></h2>

        <p><?php echo Yii::t("t", "Du som söker efter kandidater att anställa kan hitta dem 
        här genom att söka på nyckelord och inleda en enkel rekryteringsprocess och hitta din kandidat! När du är inloggad som rekryterare har du bra överblick och kan ha flera rekryteringsprocesser igång samtidigt.
        På din sida kan du spara intressanta cv.n i en hotlist, och kontakta kandidater via chatt eller mail");?> </p>

        <p><a href="<?php echo Yii::app()->baseUrl;?>/site/register" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Registrera mig ");?></a></p>
    </div>
    <div class="col-lg-4">
        <h2><?php echo Yii::t("t","Hitta dina toppkandidater ");?></h2>

        <p><?php echo Yii::t("t", "Till dig som behöver kompetent arbetskraft. På CV-pages hittar du enkelt dina kandidater. Vår databas innehåller cv:n från ett brett spektrum av 
        brancher. Du kan lätt söka efter olika folk som söker olika former av anställning. Databasen har en global räckvidd, vilket innebär att du kan hitta kompetens på olika platser i världen. ");?> .</p>

        <p><a href="<?php echo Yii::app()->baseUrl;?>/cv"class="btn btn-primary btn-block" href="#"><?php echo Yii::t("t","Sök i cv-databasen ");?></a></p>
    </div>
</div>

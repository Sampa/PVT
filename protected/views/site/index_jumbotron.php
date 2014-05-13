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
                            			<form action="<?php echo Yii::app()->baseUrl;?>/cv/#results" method="get">
                                			<div class="input-group">
                                				<input type="text" class="form-control" name="searchKey" placeholder=<?php echo Yii::t("t","Sökord");?>>
                                				<span class="input-group-btn">
                                					<button class="btn btn-info" type="submit"><?php echo Yii::t("t","Sök");?></button>
                                				</span>
                            				</div><!-- /input-group -->
                            			</form>
                            		</div>

                            	<div class="col-xs-6 col-md-2"></div>

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
            <a class="left carousel-control"  href="#carousel-example-generic" data-slide="prev">
                <span style="margin-left:-85px; "class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control"  href="#carousel-example-generic" data-slide="next">
                <span style="margin-left:35px;width: 50px;" class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div><!-- /carousel -->
    </div>
</div>

<!--<div id="footer"></div>-->
<center>
    <p style="font-size: 25px; margin-left: auto;  margin-right: auto;width:580px;">
        <?php echo Yii::t("t", "Hej").$username.t("För att slutföra din registrering måste du aktivera ditt konto")."<br/>".t("Klicka på länken nedan.");?>
    </p>
    <div style=" display: block;
                               -moz-border-radius:3px;
                               -webkit-border-radius:3px;
                                background-color:#1aa0ff;
                                 border-radius:3px;
                                 margin-left: auto;
                                  margin-right: auto;
                                 width:180px;
                                ">
        <a style="color:#ffdead; font-size: 40px;text-decoration: none" href="<?php echo $activation_url;?>"
           target="_blank">Activate</a>
    </div>
</center>



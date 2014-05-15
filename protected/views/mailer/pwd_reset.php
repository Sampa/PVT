<center>
    <p style="font-size: 25px; margin-left: auto;  margin-right: auto;width:580px;">
        <?php echo Yii::t("t", "Hej".$username.",du efterfrågade en lösenordsåterställning.
        Klicka på länken nedan för att göra återställningen.<br>
        Om du inte efterfrågade en lösenordsåterställning, ignorera det här mailet.");?>
    </p>
    <div style=" display: block;
                               -moz-border-radius:3px;
                               -webkit-border-radius:3px;
                                background-color:#75078a;
                                 border-radius:3px;
                                 margin-left: auto;
                                  margin-right: auto;
                                 width:180px;
                                ">
        <a style="color:#ffdead; font-size: 40px;text-decoration: none" href="<?php echo $reset_url;?>"
           target="_blank"><?php echo t("Återställ lösenord");?></a>
    </div>
</center>


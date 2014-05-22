<?php
/**
 * SiteController.php  class file.
 *
 * @author Spiros Kabasakalis <kabasakalis@gmail.com>
 * @copyright Copyright &copy; Spiros Kabasakalis 2013-
 * @link  InfoWebSphere,http://iws.kabasakalis.gr
 * @link  YiiLab,http://yiilab.kabasakalis.tk
 * @link  Github https://github.com/drumaddict
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package
 * @version 2.0.0
 */

class SiteController extends Controller
{
	public $layout = "//layouts/jumbotron";

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the front page file associated with the  defined layout.
        //  Layout is specified in config/main.php
        $this->render('index_'.app()->layout);
    }


    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact($renderPartial=false)
    {
        echo $this->getContactForm($renderPartial);
    }
    private function getContactForm($renderPartial=false){
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                sendHtmlEmail(
                    app()->params['myEmail'],
                    $model->name,
                    $model->email,
                    $model->subject,
                    array('body' => $model->body,
                          'name' => $model->name,
                          'subject' => $model->subject,
                          'email' => $model->email),
                    'contact',
                    'main3'
                );
                Yii::app()->user->setFlash('success', '<strong>'. t('Meddelandet har skickats!').' </strong>'. t('Tack för ditt meddelande. Vi återkommer med svar så fort vi kan.'));
                Yii::app()->getController()->refresh();
            }
        }
        if($renderPartial){
            return Yii::app()->getController()->renderPartial('/site/contact', array('model' => $model),true);
        }else
            return Yii::app()->getController()->render('/site/contact', array('model' => $model),true);
    }
    public function actionRegister()
    {
        if(!Yii::app()->user->isGuest) //redirect if logged in (can be changed later)
            $this->redirect(bu() . '/cv/admin');
        $model = new RegisterForm();

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model, array('username', 'password','new_password', 'password_confirm','verify_code','accepted'));
            Yii::app()->end();
        }

        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];
            if ($model->validate(array('email', 'username', 'new_password', 'password_confirm','verify_code','accepted'))) {
                $user = new User();
                $user->email = $_POST['RegisterForm']['email'];
                $user->username = $_POST['RegisterForm']['username'];
                $user->password = $_POST['RegisterForm']['new_password'];
                $user->name = $_POST['RegisterForm']['fullname'];
                $user->notify = $_POST['RegisterForm']['notify'];
                if ($user->save()) {
                    if($_POST['RegisterForm']['other_checkbox'] === "1"){
                        $recruiterModel = new Recruiter();
                        $recruiterModel->userId = $user->id;
                        $recruiterModel->orgName = $_POST['RegisterForm']['Companyname'];
                        $recruiterModel->VAT = $_POST['RegisterForm']['VAT'];
                        if($recruiterModel->validate())
                            $recruiterModel->save();
                    }
                    //send email     activation key has been generated on beforeValidate function in User class
                    $activation_url = $this->createAbsoluteUrl('/site/activate', array('key' => $user->activation_key, 'email' => $user->email));

                    if (sendHtmlEmail(
                        $user->email,
                        Yii::app()->name . ' Administrator',
                        null,
                        Yii::t('register', 'Account activation'),
                        array('username' => $user->username, 'activation_url' => $activation_url),
                        'activation',
                        'main2'
                    )
                    ) {
                        $msg = Yii::t('register', 'Vänligen kontrollera din e-post efter ett mail med en aktiveringslänk. Den är giltig i 24 timmar.');
                        Yii::app()->user->setFlash('success', $msg);
                        $this->redirect(bu() . '/site/login');
                    } else {
                        $user->delete();
                        $msg = Yii::t('register', 'Något gick fel. E-post med aktiveringslänk kunde inte skickas. Var vänlig gör om registreringen.');
                        Yii::app()->user->setFlash('danger', $msg);
                        $this->redirect(bu() . '/site/register');
                    }
                }
            }
        }

        $this->render('register', array('model' => $model));
    }

    public function actionEmail_for_reset()
    {
        if (isset($_POST['EmailForm'])) {
            $user_email = $_POST['EmailForm']['email'];
            $criteria = new CDbCriteria;
            $criteria->condition = 'email=:email';
            $criteria->params = array(':email' => $user_email);
            $user = User::model()->find($criteria);
            if (!$user) {
                $errormsg = Yii::t('passwordreset', 'Finns ingen användare med denna e-post.');
                Yii::app()->user->setFlash('danger', $errormsg);
                $this->refresh();
            }
            $key = $user->generate_activation_key();
            $user->reset_token = $key;
            $reset_url = $this->createAbsoluteUrl('/site/password_reset', array('key' => $key, 'email' => $user_email));
            $user->save();

            if (sendHtmlEmail(
                $user->email,
                Yii::app()->name . ' Administrator',
                null,
                Yii::t('reset', 'Password reset.'),
                array('username' => $user->username, 'reset_url' => $reset_url),
                'pwd_reset',
                'main'
            )
            ) {
                $infomsg = Yii::t('passwordreset', 'Återställningslänk har skickats. Kontrollera din e-post.');
                Yii::app()->user->setFlash('info', $infomsg);
                $this->refresh();
            } else {
                $errormsg = Yii::t('passwordreset', 'Det gick inte att skicka meddelandet med återställningslänken.');
                Yii::app()->user->setFlash('danger', $errormsg);
                $this->refresh();
            }
        }

        $model = new EmailForm;
        $this->render('email_for_reset', array('model' => $model));
    }

    public function actionPassword_reset($key, $email)
    {

        if (isset($_POST['PasswordResetForm'])) {
            $new_password = $_POST['PasswordResetForm']['password'];
            $key = $_POST['PasswordResetForm']['key'];
            $email = $_POST['PasswordResetForm']['email'];


            $criteria = new CDbCriteria;
            $criteria->condition = 'reset_token=:reset_token AND email=:email';
            $criteria->params = array(':reset_token' => $key, ':email' => $email);
            $user = User::model()->find($criteria);

            if (!$user) {
                $errormsg = Yii::t('passwordreset', 'Fel, din kontoinformation kunde inte hittas. Återställningslänken har förmodligen redan använts eller gått ut. Vänlig försök igen.');
                Yii::app()->user->setFlash('danger', $errormsg);
                $this->refresh();
            }
            $user->password = $new_password;
            $user->reset_token = NULL;

            if ($user->save()) {
                $msg = Yii::t('passwordreset', 'Ditt lösenord har återställts. Logga in med ditt nya lösenord.');
                Yii::app()->user->setFlash('success', $msg);
                $this->redirect(bu() . '/site/login');
            } else {
                $error = Yii::t('passwordreset', 'Fel, kunde inte återställa ditt lösenord.');
                Yii::app()->user->setFlash('danger', $error);
                $this->refresh();
            }
        }

        $model = new PasswordResetForm;
        $this->render('password_reset', array('model' => $model, 'key' => $key, 'email' => $email));
    }


    public function actionActivate($key, $email)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'activation_key=:activation_key AND email=:email';
        $criteria->params = array(':activation_key' => $key, ':email' => $email);
        $user = User::model()->find($criteria);
        if ($user) {
            $user->activation_key = NULL;
            $user->status = User::STATUS_ACTIVE;
            $user->save(false); //user has already  been validated when saved for the forst time.
            $successmsg = Yii::t('registration', ', välkommen! Ditt konto är aktiverat och du kan nu logga in.');
            Yii::app()->user->setFlash('success', $user->username . $successmsg);
            $this->redirect(bu() . '/site/login');
        } else {
            $errormsg = Yii::t('registration', ' Något gick fel. Ditt konto kunde inte aktiveras. Var vänlig gör om registreringen.');
            $criteria = new CDbCriteria;
            $criteria->condition = ' email=:email';
            $criteria->params = array(':email' => $email);
            $user = User::model()->find($criteria);
            $user->delete();
            Yii::app()->user->setFlash('danger', $errormsg);
            $this->redirect(bu() . '/site/register');
        }
    }


    public function actionLogin()
    {
        if(!Yii::app()->user->isGuest) //redirect if logged in (can be changed later)
            $this->redirect(bu() . '/');

        $model = new LoginForm();
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model, array('username', 'password', 'verify_code'));
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate(array('username', 'password', 'verify_code')) && $model->login()) {
                //try to find a recruiter model associated to the user
                $recruiterModel = Recruiter::model()->find("userId =".Yii::app()->user->id);
                if(is_null($recruiterModel)) //we found none, so must be publisher
                   Yii::app()->user->setState("role","publisher");
                else
                    Yii::app()->user->setState("role","recruiter"); //there is one
                //build message string for alittle more readability

                if(Yii::app()->user->getState("role")=='recruiter'){
                    $roll= Yii::t("t","rekryterare");
                }else{
                    $roll=Yii::t("t","publicerare");
                }
                $message = Yii::t("t",'Välkommen')." " . app()->user->name." ";
                $message .= Yii::t("t","du är inloggad som ");
                $message .= $roll;
                Yii::app()->user->setFlash('success',$message);
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('login', array('model' => $model));
    }

    /**
     * This is the action that handles user's logout
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


    //test email with Gmail SMPT server
        public function actionGmail()
        {

            $mailer = Yii::createComponent('application.extensions.mailer.EMailer');

            // these settings only for server,I use other settings in my localhost
            if (APP_DEPLOYED) {
                $mailer->Host = 'smtp.gmail.com';
                $mailer->IsSMTP();
                $mailer->SMTPAuth = true;
                $mailer->SMTPSecure = 'tls';
                $mailer->Port = '587';
                $mailer->Username =app()->params['myEmail'];
                $mailer->Password =  app()->params['gmail_password'];
            }

            $mailer->From = app()->params['fromEmail'];
            $mailer->AddReplyTo( app()->params['replyEmail']);
            $mailer->AddAddress(app()->params['myEmail']);
            $mailer->FromName = 'Me-Testing';

            $mailer->CharSet = 'UTF-8';
            $mailer->Subject = Yii::t('demo', 'It Works');
            $message = 'Done!';
            $mailer->Body = $message;
            $mailer->SMTPDebug = true;
            fb($mailer, "mailer OBJECT");
            $mailer->Send();
        }

        public function actionStressUpload() 
        {
            echo "Kor stress upload-----> ";
        if (Yii::app()->user->id == 1){
            for ($i=0; $i < 10000 ; $i++) { 
                //Loop 100000 times
                $cv = new Cv;
                $cv->hasGeoArea = true;
                if($i < 10001){ 
                    // $cvArea = CvArea::model()->findByPk(30);                       
                    // $cvArea->save();
                    
                    $cv->pdfText = "Javautvecklare

                    Om jobbet
                    Vill du jobba på en arbetsplats som präglas av öppenhet och där stort engagemang, driv och glatt humör värdesätts, men resultat och leverans räknas? Vi söker dig med stort hjärta och brinnande intresse för teknik som vill utvecklas genom utmanande och spännande projekt.

                    Om tjänsten
                    Du kommer ingå i ett av våra engagerade team av systemutvecklare som arbetar enligt scrum. Alla har ett brett ansvar för alla delar i leveransen. Vi jobbar gärna med ny teknologi och nya verktyg. Vi följer en strukturerad releaseplanering för ett effektivt samarbete och för att realisera de initiativ vi har i våra projektportföljer.

                    Din bakgrund och kompetens
                    Du har minst 2-3 års erfarenhet av att jobba med Java.
                    Du har en relevant akademisk examen eller motsvarande.
                    Du talar och skriver flytande svenska.
                    Du har ett brinnande intresse för teknik och utveckling på Javaplattformen.
                    IT
                    utveckling, projekt projektledare
                    
                    Meriterande 
                    Vi ser gärna att du har erfarenhet av arbete med verktyg och ramverk som:
                    Spring
                    JPA/Hibernate
                    Javascript
                    HTML/CSS
                    IT-avdelningen
                    Kontakt och ansökan
                    Känner du att tjänsten vi söker känns spännande skickar du oss ett personligt brev och CV. Har du frågor är du välkommen att ringa Martin Jilek, telefon 031-83 90 96. Sista ansökningsdag 2014-05-31.

                    Om företaget

                    Om Volvofinans Bank
                    Volvofinans Bank AB grundades 1959 och ägs av de svenska Volvo- och Renaulthandlarna, Sjätte AP-fonden och Volvo Personvagnar AB. Bankens huvuduppgift är att genom produkt- och säljfinansiering, med god lönsamhet aktivt stödja försäljningen av de produkter som marknadsförs i Volvo- och Renaulthandeln på den svenska marknaden. Huvudkontoret, med merparten av de ca 175 anställda, finns i Göteborg. IT-avdelningen består i dagsläget av 31 personer. Lösningarna utformas i nära samarbete med verksamheten med utgångspunkt utifrån bankens och våra återförsäljares behov.";
                    $cv->typeOfEmployment = 'employment';
                    $cv->title = "Van IT-utvecklare";
                }  
               // if($i< 10001){
               //      $cv->pdfText = "
               //      Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin. Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd boksättare tog att antal bokstäver och blandade dem för att göra ett provexemplar av en bok. Lorem ipsum har inte bara överlevt fem århundraden, utan även övergången till elektronisk typografi utan större förändringar. Det blev allmänt känt på 1960-talet i samband med lanseringen av Letraset-ark med avsnitt av Lorem Ipsum, och senare med mjukvaror som Aldus PageMaker.

               //      Det är ett välkänt faktum att läsare distraheras av läsbar text på en sida när man skall studera layouten. Poängen med Lorem Ipsum är att det ger ett normalt ordflöde, till skillnad från programmerare och ger intryck av att vara läsbar text. Många publiseringprogram och webbutvecklare använder Lorem Ipsum som test-text, och en sökning efter glad avslöjar många webbsidor under uteckling. Olika versioner har dykt upp under åren, ibland av olyckshändelse, ibland med flit (mer eller mindre humoristiska).
               //      Master uppsats, IT-företag, IT-avdelningen,

               //      I motsättning till vad många tror, är inte Lorem Ipsum slumvisa ord. Det har sina rötter i ett stycke klassiskt litteratur på latin från 45 år före år 0, och är alltså över 2000 år gammalt. Richard McClintock, en professor i latin på Hampden-Sydney College i Virginia, översatte ett av de mer ovanliga orden, consectetur, från ett stycke Lorem Ipsum och fann dess ursprung genom att studera användningen av dessa ord i klassisk litteratur. Lorem Ipsum kommer från styckena 1.10.32 och 1.10.33 av social (Ytterligheterna av ont och gott) av Cicero, skriven 45 före år 0. Boken är en avhandling i teorier om etik, och var väldigt populär under renäsanssen. Den inledande meningen i Lorem Ipsum, kommer från stycke 1.10.32.

               //      Den ursprungliga Lorem Ipsum-texten från 1500-talet är återgiven nedan för de intresserade. Styckena 1.10.32 och 1.10.33 från flexibel av Cicero hittar du också i deras originala form, åtföljda av de engelska översättningarna av H. Rackham från 1914.

               //      Det finns många olika varianter av Lorem Ipsum, men majoriteten av dessa har ändrats på någotvis. Antingen med inslag av humor, eller med inlägg av ord som knappast ser trovärdiga ut. Skall man använda långa stycken av Lorem Ipsum bör man försäkra sig om att det inte gömmer sig något pinsamt mitt i texten. Lorem Ipsum-generatorer på internet tenderar att repetera Lorem Ipsum-texten styckvis efter behov, något som gör denna sidan till den första riktiga Lorem Ipsum-generatorn på internet. Den använder ett ordförråd på över 200 ord, kombinerat med ett antal meningsbyggnadsstrukturer som tillsamman genererar Lorem Ipsum som ser ut som en normal mening. Lorem Ipsum genererad på denna sidan är därför alltid fri från repetitioner, humorinslag, märkliga ordformationer osv.";
               //      $cv->typeOfEmployment = 'employment';
               //      $cv->title = "Systemutvecklare med Master i IT";
                    
               //  }
                // if($i < 10001){
                //     $cv->pdfText = "Den ”anonyma” brödtexten är ett av de viktigaste formelementen i en tidning eller annan trycksak. Brödtexten är också ämnet för denna artikel, där Pelle Anderson diskuterar tidningsdesign i dag, med utgångspunkt från en rad olika tidningsprojekt.
                //     Idag, efter PostScript-teknikens segertåg över världen, är det få som funderar på om ett teckensnitt är gjort för brödtext eller rubriker; många blandar och ger ut sina trycksaker utan att ens använda de möjligheter till tillriktning av rubriker eller justering av avstavning och utslutning i textspalten som desktopprogrammen ger möjlighet till. Under blytiden, även om den epoken alls inte var bättre på alla sätt, var dock varje grad av ett typsnitt individuellt utformad. Man talade om hur ett typsnitt var ”skuret”, och skärningen varierade mycket om det var en 8 punkters matris som var målet, eller en 72 punkters.
                //     VAD ÄR DET DÅ SOM SKILJER ETT BRÖDTEXTSNITT FRÅN ETT RUBRIKSNITT?
                //     Framförallt den grövre uppbyggnaden av tecknen; avsaknaden av fina detaljer som ändå skulle vara såväl omöjliga att trycka, förutom på det allra finaste papper. Dessutom skulle dessa rubriksnittens finesser vara svåra att upptäcka med blotta ögat i de grader (mellan 6 och 14 punkter ungefär) det är fråga om för vanlig brödtext.
                //     Så är exempelvis kontrasterna mellan tecknets fetaste delar, som ansvällningar i runda former, och de tunnaste linjerna som serifferna, inte alls lika markerade i en brödtextskärning som i en rubrikskärning av ett typsnitt. X-höjden är lägre i ett rubriksnitt; dvs. att skillnaden i höjd mellan ev versal och en gemen bokstav är större i ett rubriksnitt än i ett textsnitt. Små bokstäver behöver vara bredare än större – texttypsnitt är också generösare än rubriksnitt.
                //     Tecknets svarta ytor är större i en brödtextskärning än i en rubrikskärning. Därmed dock inte sagt att brödtextsnitten alltid är grovarbetare medan rubrikerna är de förfinade adelsmännen – det finns givetvis grader också i det typografiska ståndssamhället.
                //     Ändå kan få typsnitt för dagens desktopproduktion verka helt utanför detta gamla kastsystem. För det är inte bara tecknen i sig som skiljer sig åt mellan rubriker och brödtext.
                //     Bokstavsmellanrummen är ofta större i brödtextfonterna – det är därför du tvingas knipa ihop rubrikerna när du kommer uppåt 36–48 punkter och över för att få lättlästa ordbilder. För desktopteknikens era är kompromissernas tidsepok; typsnitten som används för brödtext och rubriker är i nio fall av tio exakt desamma, med samma detaljrikedom (eller avsaknad av den) med samma glesa tillriktning, med samma grova uttryck.
                //     Ett problem som de flesta typsnitt har i PostScript är att brödtext runt 8–9 punkter blir alltför anemisk och tunn på sidan, om pappret inte suger färg och sväller bokstäverna. Trycksaker producerade i desktopteknik och tryckta på ett fint papper ser ofta ganska spetsiga, ja till och med spretiga ut i brödtexten. Det blir svårläst.
                //     Finns det typsnitt som är mer läsbara än andra? Ja, det skulle nog de flesta av oss hålla med om. Men vad är det som kännetecknar dessa typsnitt? En grupp hävdar bestämt att ”vi läser lättast det vi läser oftast”, och att det spelar mindre roll hur tecknen ser ut, bara ögat vant sig vid att känna igen teckenformerna. En annan grupp menar att det visst går att reda ut vad det är som gör att vissa typsnitt formar mer lättlästa ordbilder än andra, alldeles oavsett med vilken frekvens typsnittet förekommer i tryck.
                //     Själv är jag tveksam till maximen att ”man läser lättast det man läser oftast”. Vore det så skulle Times och Helvetica vara världens mest lättlästa typsnitt. Och det stämmer verkligen inte. Times med sin snåla, smala form och Helvetica med sina slutna, likformiga bokstavsformer är snarare bland de sämre typsnitten vad gäller läsbarhet. Dessutom glömmer man ofta saker som storlek/grad, svärta/vikt, ordmellanrum, bokstavsmellanrum/knipning, tillriktning/kerning, radmellanrum/kägel, spaltbredd, papper, tryck etc. Det mest lättlästa typsnitt går att göra fullkomligt oläsligt med några enkla åtgärder – och blir det inte sällan.
                //     Nå, om du nu står i valet och kvalet mellan exempelvis din gamla Times å ena sidan och Stone Serif å den andra, vad gör du? Att hitta rätt i dagens djungel av PostScript-typsnitt är en svår uppgift även med en guide att hålla i handen. Undersökningen av fackpressen som DtP publicerade i nr 1/94 gav vid handen att många helt enkelt avstått från valet och gör som de alltid har gjort. Det är inte alltid fel att göra så heller – redaktionen tröttnar ofta tidigare än läsarna på ett typsnitt – men det finns alternativ. Fortsättningsvis ger vi några exempel ur levande livet.
                //     TIDNINGEN IDAG
                //     John Bark och jag gjorde under 1989 en dummy för den tidning som blev resultatet av sammanslagningen av Göteborgs-Tidningen och Kvällsposten; den döptes under vårt arbete till iDAG.
                //     Göteborgs-Tidningen såg ut som Expressens kusin från landet; vilket den i viss mån var. Osjälvständigheten gentemot det traditionella kvällstidningsidealet var stor, parat med en vildsint självständighet gentemot det mesta som kom från Stockholm. Samtidigt fanns här en vision om att göra något annat, baserat på det som huvudstadens kvällstidningar skulle upptäcka fem år senare – kommer man ut på morgonen säljer man fler tidningar. GT fanns i kioskerna klockan tio på förmiddagarna. Med omgörningen till iDAG skulle kultur, debatt, utrikes och andra sidor av mera traditionellt morgontidningssnitt förstärkas. iDAG skulle konkurrera på två marknader samtidigt, utan att tappa kvällstidningens starka sidor.
                //     Kvällsposten gjordes i Malmö, närmare kontinenten och vid första anblicken av mera ”tysk” karaktär. Bild-Zeitung och Springer-pressen hyllades av en del som förebilder. Men såg man under ytan fanns en väldig professionalism, bra lokalnyheter och en hängivenhet hos medarbetarna som jag sällan mött på en dagstidning.
                //     När vi gjorde dummyn för iDAG stod det snart klart för oss att det inte gick att ta en del Malmö och en del Göteborg och blanda till en kompromissprodukt. Vi var tvungna att göra något helt nytt. Till brödtext hade GT haft Times, Kvällsposten likaså. I dummyn blev det New Century Schoolbook, som fanns i en komplett familj (så när som på kapitäler och gemena siffror). Kondenserade och bredde varianter kunde användas till anfanger.
                //     Century håller sig alltid framme när formgivare ska välja brödtextsnitt, och inte utan anledning. Det som vi i dag tycker kännetecknar Century, dess öppna, breda teckenform, var dock inte det som tidningsutgivarna sökte när de valde den ursprungliga Century, utvecklad av Theodore L. De Vinne tillsammans med Linn Boyd Benton på 1890-talet för tidskriften med samma namn. Morris Fuller Benton tecknade Century Expanded och Century Schoolbook i början av 1900-talet, och ”New” lades till av Linotype och Bitstream när typsnittet något reviderades för digital reprodukton.
                //     Då, 1894, var det typsnittets utrymmessnålhet som lockade. Senare utvecklades bredare versioner av Century, där New Century Schoolbook är den bredaste brödtextstilen (bredare än exempelvis Century Expanded). Under första hälften av 1900-talet kom en rad tidningstypsnitt; Ionic, Excelsior, Paragon, Corona, Opticon, Linotype Modern, Linotype Olympian, Intertype Ideal, Intertype Rex, Intertype Regal, Intertype Imperial, Intertype Royal, Linotye Melior m.fl. Hög läsbarhet förenar dem med Century.
                //     För en tidning som iDAG, som i hög utsträckning lever på sina bilder, var det extra viktigt att välja ett brödtextsnitt som tål att tryckarna skruvar på färginställningen för att få svärta i de stora halvtonsbilderna utan att ljusrummen inne i bokstäverna fylls av trycksvärta. Century håller också i gamla pressar – en inte oviktig sak i Malmö, där Kvällspostens gamla press sjöng på sista versen.
                //     TIDNINGEN FÖRETAGAREN
                //     Cheltenham är ett klassiskt amerikanskt typsnitt, omstritt men med obestridliga kvaliteter. Skaparen av den Cheltenham vi känner i dag hette Bertram Goodhue, och typsnittet växte snabbt ut till en familj som 1918 hade hela 24 medlemmar, alla producerade av ATF, American Type Founders Company. Att Cheltenham valdes till brödtextsnitt för New York Times bidrog till dess rykte.
                //     Goodhue ville skapa ett lättläst boktypsnitt, bland annat genom att göra de uppåtgående staplarna längre och mer markerade än de nedåtgående; detta baserat på den korrekta teorin om att denna del av bokstaven är viktigare för igenkännande än underdelen.
                //     MODERNA TIDER
                //     Cochin har haft en särskild plats i den svenska bokformgivningens historia. Det var Acke Kumliens favorittypsnitt, och vanligt på 40-talet, för att sedan helt försvinna. När Cochin äntligen släpptes i PostScript-format blev det snabbt populärt i annonser. Numera existerar även Nicolas Cochin från FontHaus i USA, ett ännu mera särpräglat typsnitt.
                //     Som brödtext är Cochin, förutsett att det får tillräckligt med kägel, lättläst och behagligt, med en förfinad karaktär. Uppenbarligen blev det för mycket för Moderna Tiders redaktion, som övergick till Garamond efter någon tid (först den vedervärdiga ITC Garamond, därefter Garamond nr 3).
                //     PERSONAL C++, CSharp, mogen, extrem, 
                //     Minion Multiple Master är Adobes första antikva med optisk skalning – det som är multiple master-teknikens innersta mening. Optisk skalning innebär att du själv kan skapa inte bara vilken storlek som helst av typsnittet (det går ju med alla PostScript-snitt) eller vilken bredd eller svärta/fethet som helst (det går med alla Multiple Master-typsnitt) utan också vilken ”optisk storlek” som helst.
                //     Här kommer vi tillbaka till det som jag berörde inledningsvis. Förr, under blyepoken, skars varje grad av typsnittet för sig. Varje storlek fick sina egna karaktäristika, sin egen speciella grad av detaljrikedom, sitt eget förhållande mellan tjocka och tunna linjer. Med multipe master-tekniken kan du skapa precis samma sak.
                //     I fallet med tidningen Personal (som lär vara världens första tidning designad helt med multiple master-typsnitt) var det tur. Papperskvaliteten och trycket gjorde att brödtexten i det första omdesignade såg alldeles för tunn ut. Genom att variera den optiska axeln i ”Font Creator”-rutan så skapade jag en variant som blev något grövre – på det sättet simulerade jag ett papper som sög mera färg och svällde bokstäverna.
                //     Det mest intressanta Multiple Master-projektet just nu är ITC som gett Sumner Stone i uppdrag att ta fram en Bodoni, baserad på Giambattista Bodonis egna provböcker. Kanske kan världen inom kort få reda på hur en äkta Bodoni ser ut.
                //     TCO-TIDNINGEN
                //     Swift, tecknat av holländaren Gerard Unger (1985), har inte vunnit några större framgångar. Jag tycker att det är obegripligt, eftersom typsnittet är ett av de mest lättlästa och samtidigt vackraste som finns för tidningstext. I TCO-tidningen, tidigare satt i Times (vad annars), får läsarna Swift tryckt på vanligt tidningspapper i tabloidformat, i en rulloffsetpress som annars trycker exempelvis Dagens Industri. Storleken på brödtexten är lite olika, något större i kröniketext som sätts på bredspalt med ojämn höger, men för det mesta.
                //     Swift har den exakta, kanske lite intellektuella kvalitet som kännetecknar alla Gerard Ungers typsnitt; ljusa och öppna bokstavsformer och ett mycket individuellt uttryck. Ljusrummen inne i tecknen, liksom de ljusrum som bildas mellan dem, bidrar tillsammans med de kraftigt markerade serifferna till att skapa ordbilder som är distinkta och lättlästa. Tyvärr har Elsner & Flache, som säljer Swift, inte gjort något särskilt bra jobb. Det saknades exempelvis länkar mellan mager rak Swift och de kursiva och halvfeta arianterna. Samtidigt som vi byggde in detta, passade vi på att ersätta versalsiffrorna med gemena sådana.";
                //     $cv->typeOfEmployment = 'employment';
                //     $cv->title = "PHP VA E DE";
                    
                // }

                // if($i <10001){
                //     $cv->pdfText = "Livet är rätt svårt nu, och allting gör så ont. Min själ den är trasig. Snart orkar jag inte mer. 
                //     Jag gråter som ett barn när ingen annan ser.
                //     Jag vill berätta, jag vill att ni ska förstå. Men vem bryr sig om mitt öppna sår? 
                //     Ångest varje dag, en känsla utav hopplöshet. Tårar som rinner längst mina kinder.
                //     För att hjärtat är tomt och någonting här saknas. Snälla Gud, bara ta mig tillbaka. 
                //     Tillbaka till en verklighet där jag kan få leva utan ångest och panik. Javascript, java, php
                //     Projektledaré
                //     Jag kämpar varje dag även fast jag inte vill. Hur ska man kunna se ett ljus när mörkret bara står still. 
                //     När jag tänker tillbaka på livet som var då kan jag nu förstå att jag har haft väldigt svårt.";
                //     $cv->typeOfEmployment = 'consult';
                //     $cv->title = "Bättre än August";
                
                // }
                // if($i <10001){
                //     $cv->pdfText = "Jonas Wettergren
                //     Tel: 0701234567

                //     Sveavägen 136a, 4tr
                //     Rekrytering@safemind.se
                //     www.safemind.se
                //     Pers nr: 730420-5662     

                //     Mål
                //     Mitt mål är att inom 3 år vara arkitekt för en utvecklingsgrupp på ett medelstort IT-företag. Kortsiktigt mål är att utvecklas och lära mig av - och tillsammans med – kompetenta kollegor. 
                //     Dessutom skulle jag värdera en arbetsgivare som kan erbjuda mig utbildning till certifierad scrummaster.
                //     Arbetslivserfarenhet
                //     2005 - 2008 | Arkitekt/Systemutvecklare
                //     Dataföretaget E-affär inc | PHP, C#
                //     Utveckling av befintlig säljstödsystem och webbutikslösningar för 200 mindre företag. Varje företag får specialanpassningar av standardapplikationen. Vidare/nyutveckling av produkten. Vi är totalt 3 st utvecklare, varav jag har huvudansvar för produkterna. C#/.NET 3.5, scrum, WPF (Windows Presentation Foundation)

                //     2003 - 2004 | Systemutvecklare
                //     Dokumentsystem AB | ASP, C#
                //     Utveckling av dokumenthanteringssystem. Backend/frontend 
                //     Kund: Tre (3)

                //     2002 - 2003 | Systemutvecklare
                //     Spray | Java, vb, C#, Flash
                //     Utveckling av befintlig plattform, kunder: SSAB, TDC, Telenor, Ericsson, 
                //     Utbildning
                //     2002 | Civ ing Datateknik 180 p KTH
                //     •   Ex-jobb inom spelutveckling AI
                //     Övriga kvalifikationer
                //     •   Trädgårdsprogramvara: På fritiden utvecklar jag en 3D-programvara för Xbox 360, där man med enkla verktyg ska kunna rita upp en trädgård, ljussätta denna och se hur olika växer ser ut under olika delar av säsongen. Ex. kan man välja höga gula växter som man vill att ska blomma tidigt på våren. Beroende på om man väljer söder- eller norrläge så får man olika förslag på växter.
                //     ";
                //     $cv->typeOfEmployment = 'consult';
                //     $cv->title = "Scrum for life";
                                    // }
                $cv->save(false);
            }
                echo " Skapat 10.000 CV";
        } else {
            throw new CHttpException(400,t('Ogiltig begäran'));
        }

        }


}
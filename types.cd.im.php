<?php 
    header('Content-Type: text/html; charset=utf-8');
    include_once('../../viva-config-files/_inc.file.php');
    $cnx = new GeneConnexion();
    function __uploadFile($filesHDN,$cnx){
        $error_message = [];
        $arrayFile = [];
        if (!empty($filesHDN)) {
            foreach ($filesHDN as $file) {
                if ($file['error'] == UPLOAD_ERR_EXTENSION 
                || $file['error'] == UPLOAD_ERR_CANT_WRITE
                || $file['error'] == UPLOAD_ERR_NO_TMP_DIR
                || $file['error'] == UPLOAD_ERR_PARTIAL
                || $file['error'] == UPLOAD_ERR_FORM_SIZE
                || $file['error'] == UPLOAD_ERR_EXTENSION
                || $file['error'] == UPLOAD_ERR_INI_SIZE) {
                    $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SAVING FILE ".$file['name']],['Failed'],[$file['error']]);
                    $cnx->errorWritter($exc,2);
                    continue;
                }
                $fln = substr($file['name'],strrpos($file['name'],'.'));
                $fln_ = '_dav.me_'.rand(1945,20000).(time()).$fln;
                $destination_dir = '../../../reitec-files/inner/'.$fln_;
                $tmp_dest_dir = $file['tmp_name'];
                if (move_uploaded_file($tmp_dest_dir,$destination_dir)) {
                    array_push($arrayFile,$fln_);
                }
            }
            // 101 means all files was uploaded
            if(count($arrayFile) === count($_FILES)) return $arrayFile;
            else return '303_'.(count($_FILES) - count($arrayFile)); // means some files was uploaded
        }else return 507; // means empty table received
    }
    function __saveCours($cnx,$case,$nmfile){
        $clause = '';
        $sortby = 'id';
        $table = 'tbl_formation';
        $ss = (isset($_SESSION['ident-me-']) ? (array) $_SESSION['ident-me-'] : 1);
        $createdBy = $ss['id'] ?? 0;
        // $id = (int) trim($_POST['cours_cnnx']);
        $clse = '';
        $tble = 'tbl_content'; 
        $attr = (is_numeric($_POST['fcl_cnnx'])) ? 1 : 0;
        $idContent = $cnx->onCatchLastElement($tble,$clse,$sortby);
        $add = $cnx->onAdd([
            strtolower($_POST['categ_cnnx']),
            strtolower($_POST['subcateg_cnnx']),
            strtolower($_POST['titre_cnnx']),
            strtolower($_POST['date_s_cnnx']),
            strtolower($_POST['date_e_cnnx']),
            strtolower($_POST['fcl_cnnx']),
            strtolower($_POST['prix_cnnx']),
            1,
            $idContent,
            strtolower(htmlentities($_POST['desc_cnnx'])),$attr
            ],$clause,19000,$createdBy,$table);
        $add = (int) $add;
        // 
        switch ($add) {
            case 200:
                $cls = "";
                $up = $cnx->onAdd([$nmfile,strtolower($case)],$clse,19000,$createdBy,$tble);
                $ups = (int) $up;
                switch ($ups) {
                    case 200:
                        echo(200);
                        break;
                    case 503:
                        echo(505);
                        break;
                    default:
                        echo($up);
                        break;
                }
                break;
            case 503:
                echo(503);
                break;
            default:
                echo(505);
                break;
        }
    }
    function __updateCours($cnx,$case,$nmfile){
        $indead = (is_numeric($_GET['item'])) ? (int) $_GET['item'] : 0;
        $clause = "WHERE id = $indead";
        $sortby = 'id';
        $table = 'tbl_formation';
        $ss = (isset($_SESSION['ident-me-']) ? (array) $_SESSION['ident-me-'] : 1);
        $createdBy = $ss['id'] ?? 0;
        // $id = (int) trim($_POST['cours_cnnx']);
        $clse = '';
        $tble = 'tbl_content'; 
        $attr = (is_numeric($_POST['fcl_cnnx'])) ? 1 : 0;
        $idContent = $cnx->onCatchLastElement($tble,$clse,$sortby);
        $add = $cnx->onUpdate(
            [
                'idcateg',
                'idsubcateg',
                'title',
                'datestart',
                'dateend',
                'idfacilitateur',
                'couts',
                'isactivate',
                'idcontent',
                'synthese',
                'isattributed'
            ]
            ,[
                strtolower($_POST['categ_cnnx']),
                strtolower($_POST['subcateg_cnnx']),
                strtolower($_POST['titre_cnnx']),
                strtolower($_POST['date_s_cnnx']),
                strtolower($_POST['date_e_cnnx']),
                strtolower($_POST['fcl_cnnx']),
                strtolower($_POST['prix_cnnx']),
                1,
                $idContent,
                strtolower(htmlentities($_POST['desc_cnnx'])),
                $attr
            ],$table,$clause);
        $add = (int) $add;
        // 
        switch ($add) {
            case 200:
                $cls = "";
                $up = $cnx->onAdd([$nmfile,strtolower($case)],$clse,19000,$createdBy,$tble);
                $ups = (int) $up;
                switch ($ups) {
                    case 200:
                        echo(200);
                        break;
                    case 503:
                        echo(505);
                        break;
                    default:
                        echo($up);
                        break;
                }
                break;
            case 503:
                echo(503);
                break;
            default:
                echo(505);
                break;
        }
    }
    function __broadCastMessage($cnx,$titr,$desc){
        $table = 'tbl_etudiant';
        $table_ = 'tbl_newsletter';
        $clause = 'WHERE datastatus = 1';
        $req = $cnx->onGenRetrieve([1],'email',$clause,$table);
        $req_ = $cnx->onGenRetrieve([1],'email',$clause,$table_);
        $tbs = array_merge($req,$req_);
        $im = [];
        $im['message'] = "Cher partenaire, <br>
        Bonjour,
        Le Réseau REITEC Info vient de publier une nouvelle formation professionnelle intitulées : $titr <br> Synthèse : $desc <br>
        disponible en ligne et au centre de formation. 
        Cette formation peut aussi se tenir dans vos installations conformément aux modalités définies de commun accord. 
        Pour consulter l’offre de formation, appuyer sur le lien suivant <a href='https://reitecinfo.net?page=formations'>Reitec Info | Formations</a>";
        $im['from'] = 'formation@reitecinfo.net';
        $im['subject'] = '<< NOUVELLE FORMATION DISPONIBLE >>';
        foreach ($tbs as $vl) {
            foreach($vl as $key => $vs){
                $im['email'] = trim($vs);
                $stt = $cnx->sendMail($im);
                // echo($stt.'<br>');
            }
        }
    }
    function __onAdd_($cnx){
        if(isset($_POST['titre_cnnx'])){
            $kss = $_POST['kind_cnnx'];
            switch($kss){
                case 'aspdf':
                    $stfile = __uploadFile($_FILES,$cnx);
                    // echo(implode(',',__uploadFile($_FILES,$cnx)));
                    if(is_array($stfile) && count($stfile) > 0){
                        // my universal separator is hashtag ( # )
                        __updateCours($cnx,$kss,implode('#',$stfile));
                        // __broadCastMessage($cnx,$_POST['titre_cnnx'],$_POST['desc_cnnx']);
                    }else echo(500);
                    break;
                case 'asvideourl': //coursKind name of input 
                    __updateCours($cnx,$kss,trim($_POST['coursKind']));
                    // __broadCastMessage($cnx,$_POST['titre_cnnx'],$_POST['desc_cnnx']);
                    break;
                case 'astext':
                    // var_dump($_POST);
                    __updateCours($cnx,$kss,trim($_POST['coursKind']));
                    // __broadCastMessage($cnx,$_POST['titre_cnnx'],$_POST['desc_cnnx']);
                    break;
                default :
                    echo(500);
                break;        
            }
        }
    }
    if(isset($_GET['cbad'])){
        $c = trim($_GET['cbad']);
        switch ($c) {
            case 'edit':
                __onAdd_($cnx);
                break;
            default:
                echo("unknown key : $c");
                break;
        }
    }
    if(isset($_GET['cba'])){
        if(isset($_POST['titre_cnnx'])){
            $kss = $_POST['kind_cnnx'];
            switch($kss){
                case 'aspdf':
                    $stfile = __uploadFile($_FILES,$cnx);
                    // echo(implode(',',__uploadFile($_FILES,$cnx)));
                    if(is_array($stfile) && count($stfile) > 0){
                        // my universal separator is hashtag ( # )
                        __saveCours($cnx,$kss,implode('#',$stfile));
                        // echo 200;
                        __broadCastMessage($cnx,$_POST['titre_cnnx'],$_POST['desc_cnnx']);
                    }else echo(500);
                    break;
                case 'asvideourl': //coursKind name of input 
                    __saveCours($cnx,$kss,trim($_POST['coursKind']));
                    __broadCastMessage($cnx,$_POST['titre_cnnx'],$_POST['desc_cnnx']);
                    break;
                case 'astext':
                    // var_dump($_POST);
                    __saveCours($cnx,$kss,trim($_POST['coursKind']));
                    __broadCastMessage($cnx,$_POST['titre_cnnx'],$_POST['desc_cnnx']);
                    break;
                default :
                    echo(500);
                break;        
            }
        }
    }
    if(isset($_GET['abc'])){
        $inc = $_GET['abc'];
        // ------------------
        switch ($inc) {
            case 'sendkey':

                $im = [];
                $em = $_GET['em'];
                $key = $_GET['key'];
                $spec = $_GET['_spec'];
                $name = $_GET['_fullname'];
                $title = $_GET['_title'];
                $im['message'] = '
                <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Reitec Info - Activation </title>
                        <style>
                            body{
                                margin: 0;
                                padding: 0;
                                height: 100vh;
                            }
                            .container{
                                width: 100%;
                                height: auto;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                /* padding-left: 5px; */
                                background-color: #ccc;
                            }
                            .for-badge{
                                padding: 2px 10px;
                                background-color: beige;
                                border: 1px solid #0000;
                            }
                            .inner{
                                padding: 10px 40px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h4>Bonjour</h4>
                            <p>Cher <strong>'.$name.'</strong> Nous avons reçu votre demande de formation et nous l\'avons examinée avec succès.<br />
                            Felicitation vous etes admis de prendre part a la formation en question, 
                            Pour activer la formation vous allez <strong>copier</strong> la clé et la <strong> coller </strong> 
                            sans rien y ajouter pas même un espace sinon elle ne marchera pas<br />
                            Si vous la donnée a un proche pour que a son tour lui aussi suive la formation la clé ne fonctionnera pas non plus <br>
                            <strong>Votre clé est : <strong class="for-badge">'.$key.'</strong></strong>
                            </p>
                            <h4>Etapes à suivre</h4>
                            <p>
                                <strong>1 : Clique </strong> <a href="https://reitecinfo.net/index.php?page=readingcours&_mkr=0e7c58059088cc0734f6357e857c634f88776a35&_spc='.$spec.'" target="_blank" rel="noopener noreferrer">ICI</a><br>
                                <strong>2 : Copie </strong>la clé ci-haut <br>
                                <strong>3 : Colle </strong>là dans la case reservée <br>
                                <strong>4 : Clique </strong>sur activer <br>
                                <strong>5 : Merci </strong> 
                            </p>
                            <p>Merci pour votre confiance , l\'Equipe <strong>Reitec - Info</strong> Vous remercie</p>
                        </div>
                    </body>
                    </html>
                ';

                $im['from'] = 'formation@reitecinfo.net';
                $im['subject'] = "<< CLE D'ACTIVATION DE LA FORMATION | $title >>";
                $im['email'] = trim(htmlentities($em));
                // var_dump($im);
                // return false;
                $pcs = $cnx->sendMail($im);
                if($pcs) echo 200;
                else echo 500;
                break;
            case 'reply':
                $clause = '';
                $table = 'tbl_contact';
                $im = json_decode($_GET['content'],true);
                $pcs = $cnx->onSendMail($im,$table,$clause);
                $pcs_ = (int) $pcs;
                switch ($pcs) {
                    case 200:
                        echo(200);
                        break;
                    case 203:
                        echo(405);
                        break;
                    default:
                        echo($pcs);
                        break;
                }
                break;
            // ----------------
            case 'subcateg':
                $item = (int)$_GET['item'];
                $clause = "WHERE idcategcours = $item";
                $tbl = 'tbl_subcateg_cours';
                $output = 'subcateg';
                $pcs = $cnx->onGenRetrieve([1],$output,$clause,$tbl);
                if($pcs !== '500'){
                    if(!empty($pcs)){
                        echo(json_encode($pcs));
                    }
                }else echo(500);
                break;
            // ---------------- 
            case 'art':
                $clause = '';
                $tbl = '_tbl_piece';
                $pcs = $cnx->onGenRetrieve([1],$clause,$tbl);
                if($pcs !== '500'){
                    if(!empty($pcs)){
                        echo(json_encode($pcs));
                    }
                }else echo(500);
                break;
            // ---------------- 
            case 'deletecours':
                $id = (int) $_GET['item'];
                $table = (isset($_GET['tbl'])) ? $_GET['tbl'] : 'tbl_contact';
                $clause = ",idFacilitateur = 0 WHERE id = $id";
                if($cnx->onRMV($table, $clause)) echo(200);
                else echo(405);
                break;
            case 'dele':
                $id = (int) $_GET['item'];
                $table = (isset($_GET['tbl'])) ? $_GET['tbl'] : 'tbl_contact';
                $clause = "WHERE id = $id";
                if($cnx->onRMV($table, $clause)) echo(200);
                else echo(405);
                break;
            // ----------------
            case 'save-art':
                $clause = '';
                $tbl = '_tbl_lot';
                $data = isset($_GET['datas']) ? $_GET['datas'] : null;
                $session = (array) $_SESSION['ident-me'];
                $svd = $cnx->onSavingLot($data,$clause,$session['idnumber'],$tbl);
                switch ((int)$svd) {
                    case 500:
                        // mauvais format du string envoye il doit etre un json
                        echo(500);
                        break;
                    case 501:
                        // erreur du parse du string envoye
                        echo(501);
                        break;
                    case 200:
                        // operation reussie
                        echo(200);
                        break;
                    case 503:
                        // violation de contrainte d'integrite MySQL
                        echo(503);
                        break;
                    default:
                        // erreur inconnue david.me
                        echo(555);
                        break;
                }
                break;
            // ----------------
            case 'add':
                var_dump($_GET['data']);
                break;
            default:
                echo('undefined key : '.$inc);
                break;
        }
    }
    if(isset($_POST['nom_cnnx'])){
        $inc = $_GET['cba']; //categ_cnnx
        // var_dump($_POST);
        // var_export($_GET);
        switch ($inc) {                
            case 'add':
                // var_dump($cnx->onCatchLastElement('tbl_facilitateur','WHERE datastatus = 1','id'));
                // var_export($_POST);
                $clause = '';
                $sortby = 'id';
                $table = 'tbl_facilitateur';
                $ss = (array) $_SESSION['ident-me-'];
                $id = (int) trim($_POST['cours_cnnx']);
                $idFacil = $cnx->onCatchLastElement($table,$clause,$sortby);
                $add = $cnx->onAdd([
                    strtolower($_POST['nom_cnnx']),
                    strtolower($_POST['pst_cnnx']),
                    strtolower('logo.png'),
                    strtolower($_POST['tele_cnnx']),
                    strtolower($_POST['email_cnnx']),
                    strtolower($_POST['gender_cnnx']),
                    strtolower($_POST['access_cnnx']),
                    strtolower($_POST['nn_cnnx']),
                    md5(ucwords($_POST['pwd_cnnx']))],$clause,19000,$ss['id'],$table);
                $add = (int) $add;
                switch ($add) {
                    case 200:
                        // echo($idFacil);
                        $tb = 'tbl_cours';
                        $cls = "WHERE id = $id";
                        $up = $cnx->onUpdate(['isattributed','idFacilitateur'],[0,$idFacil],$tb,$cls);
                        $ups = (int) $up;
                        switch ($ups) {
                            case 200:
                                echo(200);
                                break;
                            case 503:
                                echo(505);
                                break;
                            default:
                                echo($up);
                                break;
                        }
                        break;
                    case 503:
                        echo(503);
                        break;
                    default:
                        echo(505);
                        break;
                }
                break;
            case 'edit':
                // var_dump($cnx->onCatchLastElement('tbl_facilitateur','WHERE datastatus = 1','id'));
                // var_export($_POST);
                $idx = (int) $_GET['position'];
                $clause = "WHERE id = $idx";
                $sortby = 'id';
                $table = 'tbl_facilitateur';
                $ss = (array) $_SESSION['ident-me-'];
                $id = (int) trim($_POST['cours_cnnx']);
                $idFacil = $cnx->onCatchLastElement($table,$clause,$sortby);
                $add = $cnx->onUpdate(['nom','prenom','telephone','email','gender','nn'],[
                    strtolower($_POST['nom_cnnx']),
                    strtolower($_POST['pst_cnnx']),
                    strtolower($_POST['tele_cnnx']),
                    strtolower($_POST['email_cnnx']),
                    strtolower($_POST['gender_cnnx']),
                    strtolower($_POST['nn_cnnx'])
                ],$table,$clause);
                $add = (int) $add;
                switch ($add) {
                    case 200:
                        $tb = 'tbl_cours';
                        $cls = "WHERE id = $id";
                        $up = $cnx->onUpdate(['isattributed','idFacilitateur'],[0,$idx],$tb,$cls);
                        $ups = (int) $up;
                        switch ($ups) {
                            case 200:
                                echo(200);
                                break;
                            case 503:
                                echo(505);
                                break;
                            default:
                                echo($up);
                                break;
                        }
                        break;
                    case 503:
                        echo(503);
                        break;
                    default:
                        echo(505);
                        break;
                }
                break;
            default:
                echo('dav.me vous salut xoxo undefined key :: '.$inc);
                break;
        }
    }
    // ------------------
?>
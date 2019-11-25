<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\Persona;
use app\models\Domicilio;
use app\models\TipoDomicilio;
use app\models\Telefono;
use app\models\TipoTelefono;
use app\models\TipoUsuario;
use app\models\Email;

use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * BackendUsuarioController implements the CRUD actions for Usuario model.
 */
class BackendUsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Shows user profile
     * @return mixed
     */
    public function actionProfile()
    {
        $logged = Yii::$app->user->identity -> findByUsername ( Yii::$app->user->identity->username );

        return $this->render('view', [
            'model' => $this->findModel($logged->id),
        ]);        
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();
        $model->scenario = Usuario::SCENARIO_CREATE;

        $modelPersona = new Persona();

        $modelDomicilio = new Domicilio();

        if ( $modelPersona->load(Yii::$app->request->post()) && $modelPersona->save() ) {

            $model->id_persona_fk = $modelPersona->idpersona;

            if ( Yii::$app->request->isPost && isset ( $_FILES ) ) {
                $model->imagenFile = UploadedFile::getInstance ( $model, 'imagenFile' );                   
                if ( $file = $model->upload() ) {
                    $model->imagen = $file;
                } 
            }
            
            $model -> id_tipo_usuario_fk = $_POST['Usuario']['id_tipo_usuario_fk'];

            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                if ( isset ( $_POST['Usuario'] ) ) {
                    $model -> password = sha1 ( $_POST['Usuario']['password'] );
                    $model -> save ();
                }

                //dependencies
                //emails
                if ( isset ( $_POST['user_emails'] ) ) {   

                    $emails = $modelPersona -> emails;
                    foreach ($emails as $email)
                        $email -> delete ();
                    foreach ($_POST['user_emails'] as $index => $emailString ) {                    
                        $email = new Email;
                        $email -> direccion = $emailString;
                        $email -> id_persona_fk = $modelPersona -> idpersona;
                        if (!$email -> save ()){
                            var_dump($email -> getErrors ());
                            exit;
                        }

                    }
                }

                //phones
                if ( isset ( $_POST['user_phones'] ) ) {                    
                    $phones = $modelPersona -> telefonos;
                    foreach ($phones as $phone)
                        $phone -> delete ();
                    $i = 0;
                    foreach ($_POST['user_phones'] as $index => $number) {                    
                        $phone = new Telefono;
                        $phone -> numero = $number;
                        if (isset ( $_POST['user_type_phones'][$i] ) )
                            $phone -> id_tipo_telefono_fk = $_POST['user_type_phones'][$i++];                
                        $phone -> id_persona_fk = $modelPersona -> idpersona;
                        $phone -> save ();
                    }
                }    

                //addresses
                if ( isset ( $_POST['user_address'] ) ) {                    
                    $domicilios = $modelPersona -> domicilios;
                    foreach ($domicilios as $domicilio)
                        $domicilio -> delete ();
                    $i = 0;
                    foreach ($_POST['user_address'] as $index => $direccion) {                    
                        $domicilio = new Domicilio;
                        $domicilio -> direccion = $direccion;
                        if (isset ( $_POST['user_type_address'][$i] ) )
                            $domicilio -> id_tipodomicilio_fk = $_POST['user_type_address'][$i++];                
                        $domicilio -> id_persona_fk = $modelPersona -> idpersona;
                        $domicilio -> save ();
                    }
                }                  
                

                return $this->redirect(['view', 'id' => $model->idusuario]);
            }

        }

        $typeUsers = TipoUsuario::find()->all();
        $types = [];
        foreach ($typeUsers as $typeUser) {
            $types [ $typeUser -> idTipoUsuario ] = $typeUser -> tipo;
        }

        $typeDomicilios = TipoDomicilio::find()->all();
        $typesPhos= TipoTelefono::find()->all();

        return $this->render('create', [
            'model' => $model, 'modelPersona' => $modelPersona, 'typeUsers' => $types, 'modelDomicilio' => $modelDomicilio, 'typeDomicilios' => $typeDomicilios, 'typePhones' => $typesPhos,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldPassword = $model -> password;

        $model->scenario = Usuario::SCENARIO_UPDATE;

        $modelPersona = $model -> personaFk;

        if ( !$modelPersona )
            $modelPersona = new Persona();

        if ( $modelPersona -> domicilios )
            $modelDomicilio = $modelPersona -> domicilios [0];
        else
            $modelDomicilio = new Domicilio();

        if ( $modelPersona->load(Yii::$app->request->post()) && $modelPersona->save() ) {
            
            $model->id_persona_fk = $modelPersona->idpersona;
            
            if ( Yii::$app->request->isPost && isset ( $_FILES ['Usuario']['name']['imagenFile'] ) && $_FILES ['Usuario']['name']['imagenFile'] != "" ) {
                $model->imagenFile = UploadedFile::getInstance ( $model, 'imagenFile' );                   
                if ( $file = $model->upload() ) {
                    $model->imagen = $file;
                } 
            }

            $model -> id_tipo_usuario_fk = $_POST['Usuario']['id_tipo_usuario_fk'];

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                if ( isset ( $_POST['Usuario'] ) && $_POST['Usuario']['password'] != "" ) {
                    $model -> password = sha1 ( $_POST['Usuario']['password'] );
                    $model->save();
                } else {
                    $model -> password = $oldPassword;
                    $model->save();
                }

                //dependencies
                //emails
                if ( isset ( $_POST['user_emails'] ) ) {   

                    $emails = $modelPersona -> emails;
                    foreach ($emails as $email)
                        $email -> delete ();
                    foreach ($_POST['user_emails'] as $index => $emailString ) {                    
                        $email = new Email;
                        $email -> direccion = $emailString;
                        $email -> id_persona_fk = $modelPersona -> idpersona;
                        if (!$email -> save ()){
                            var_dump($email -> getErrors ());
                            exit;
                        }

                    }
                }

                //phones
                if ( isset ( $_POST['user_phones'] ) ) {                    
                    $phones = $modelPersona -> telefonos;
                    foreach ($phones as $phone)
                        $phone -> delete ();
                    $i = 0;
                    foreach ($_POST['user_phones'] as $index => $number) {                    
                        $phone = new Telefono;
                        $phone -> numero = $number;
                        if (isset ( $_POST['user_type_phones'][$i] ) )
                            $phone -> id_tipo_telefono_fk = $_POST['user_type_phones'][$i++];                
                        $phone -> id_persona_fk = $modelPersona -> idpersona;
                        $phone -> save ();
                    }
                }    

                //addresses
                if ( isset ( $_POST['user_address'] ) ) {                    
                    $domicilios = $modelPersona -> domicilios;
                    foreach ($domicilios as $domicilio)
                        $domicilio -> delete ();
                    $i = 0;
                    foreach ($_POST['user_address'] as $index => $direccion) {                    
                        $domicilio = new Domicilio;
                        $domicilio -> direccion = $direccion;
                        if (isset ( $_POST['user_type_address'][$i] ) )
                            $domicilio -> id_tipodomicilio_fk = $_POST['user_type_address'][$i++];                
                        $domicilio -> id_persona_fk = $modelPersona -> idpersona;
                        if (!$domicilio -> save ()) {
                            var_dump($domicilio -> getErrors ());
                            exit;
                        };
                    }
                }                              

                return $this->redirect(['view', 'id' => $model->idusuario]);
            } 

        }

        $typeUsers = TipoUsuario::find()->all();
        $types = [];
        foreach ($typeUsers as $typeUser) {
            $types [ $typeUser -> idTipoUsuario ] = $typeUser -> tipo;
        }

        $typeDomicilios = TipoDomicilio::find()->all();
        $typesPhos= TipoTelefono::find()->all();

        return $this->render('update', [
            'model' => $model, 'modelPersona' => $modelPersona, 'typeUsers' => $types, 'modelDomicilio' => $modelDomicilio, 'typeDomicilios' => $typeDomicilios, 'typePhones' => $typesPhos,
        ]);

    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

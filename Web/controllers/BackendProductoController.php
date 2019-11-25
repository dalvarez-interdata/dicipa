<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\TipoProducto;
use app\models\Caracteristica;
use app\models\Categoria;
use app\models\VolumenPrueba;
use app\models\ProductoCategoria;
use app\models\ProductoCaracteristica;
use app\models\ProductoPrueba;
use app\models\ProductoImagen;

use app\models\Marca;
use app\models\Prueba;

use app\models\ProductoSearch;
use app\models\PruebaSearch;
use app\models\TipoProductoSearch;
use app\models\CategoriaSearch;
use app\models\CaracteristicaSearch;
use app\models\MarcaSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

define ( 'UPLOAD_POST_MAX_FILESIZE', 1000000 );
define ( 'APP_TMP_FILES_PATH' , 'uploads/tmp');
define ( 'APP_UPLOADS' , 'uploads/products');
/**
 * BackendProductoController implements the CRUD actions for Producto model.
 */
class BackendProductoController extends Controller
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
                  //  'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModelTipoProducto = new TipoProductoSearch();
        $dataProviderTipoProducto = $searchModelTipoProducto->search(Yii::$app->request->queryParams);

        $searchModelCategoria = new CategoriaSearch();
        $dataProviderCategoria = $searchModelCategoria->search(Yii::$app->request->queryParams);

        $searchModelCaracteristica = new CaracteristicaSearch();
        $dataProviderCaracteristica = $searchModelCaracteristica->search(Yii::$app->request->queryParams);

        $searchModelTest = new PruebaSearch();
        $dataProviderTest = $searchModelTest->search(Yii::$app->request->queryParams);

        $searchModelMarca = new MarcaSearch();
        $dataProviderMarca = $searchModelMarca->search(Yii::$app->request->queryParams);        

        return $this->render('index', [
            
            'searchModelProduct' => $searchModel,
            'dataProviderProduct' => $dataProvider,

            'searchModelTipoProducto' => $searchModelTipoProducto,
            'dataProviderTipoProducto' => $dataProviderTipoProducto,

            'searchModelCategoria' => $searchModelCategoria,
            'dataProviderCategoria' => $dataProviderCategoria,    

            'searchModelCaracteristica' => $searchModelCaracteristica,
            'dataProviderCaracteristica' => $dataProviderCaracteristica,    

            'searchModelTest' => $searchModelTest,
            'dataProviderTest' => $dataProviderTest,         

            'searchModelMarca' => $searchModelMarca,
            'dataProviderMarca' => $dataProviderMarca,                                                
        ]);
    }

    /**
     * Displays a single Producto model.
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
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //dependencies
            //categories
            if ( isset ( $_POST['categories'] ) ) {
                
                $categories = $model -> productoCategorias;
                foreach ($categories as $category)
                    $category -> delete ();

                foreach ($_POST['categories'] as $index => $id_category) {                    
                    $product_category = new ProductoCategoria;
                    $product_category -> producto_id_fk = $model -> idproducto;
                    $product_category -> categoria_id_fk = $id_category;
                    $product_category -> save ();
                }
            }
            //features
            if ( isset ( $_POST['features'] ) ) {
                
                $categories = $model -> productoCaracteristicas;
                foreach ($categories as $category)
                    $category -> delete ();

                foreach ($_POST['features'] as $index => $id_feature) {                    
                    $product_feature = new ProductoCaracteristica;
                    $product_feature -> id_producto_fk = $model -> idproducto;
                    $product_feature -> id_caracteristica_fk = $id_feature;
                    $product_feature -> save ();
                }
            }  

            //tests
            if ( isset ( $_POST['tests'] ) ) {
                
                $tests = $model -> productoPruebas;
                foreach ($tests as $test)
                    $test -> delete ();

                foreach ($_POST['tests'] as $index => $id_test) {                    
                    $product_test = new ProductoPrueba;
                    $product_test -> producto_id_fk = $model -> idproducto;
                    $product_test -> prueba_id_fk = $id_test;
                    $product_test -> save ();
                }
            }  

        if ( isset ( $_FILES ) ) {

            foreach ($_FILES as $file ) {
               
               foreach ($file ['name'] as $key => $name) {
                   
                   if ( $name != "" ) {

                        $extension = explode (".", $name );
                        $extension = end ( $extension );
                        $extension = strtolower($extension);                        

                        //file type validation
                        if ($extension != 'jpeg' && $extension != 'jpg' && $extension != 'png' && $extension != 'gif')
                            throw new CHttpException(500, Yii::t ('error', 'FILE_TYPE_ERROR'));                        

                        $tmp = APP_UPLOADS . '/prod_' . $model -> idproducto;
                        if ( !is_dir( $tmp ) )
                            mkdir($tmp);

                        $nameimg  = md5 ( uniqid ( ) . "_" . $name ) . "." . $extension ;
                        $img = $tmp .'/'. $nameimg;
                        
                        if ( !move_uploaded_file( $file ['tmp_name'][$key] ,  $img) ) {
                            throw new CHttpException ( 500, Yii::t ('error', 'UPLOAD_ERROR') );                                 
                        } else {
                            $imagen = new ProductoImagen;
                            $imagen -> id_producto_fk = $model -> idproducto;
                            $imagen -> imagen = $nameimg;
                            $imagen -> portada = 0;
                            $imagen -> save ();
                        }                                            
                   }
               }
            }
        }


            return $this->redirect(['view', 'id' => $model->idproducto]);
        }

        //type of products
        $typeProducts = TipoProducto::find()->all();
        $typesP = [];
        foreach ($typeProducts as $typeProduct) {
            $typesP [ $typeProduct -> idTipoProducto ] = $typeProduct -> nombre;
        }

        //Marks
        $marcas = Marca::find()->all();
        $brands = [];
        foreach ($marcas as $marca) {
            $brands [ $marca -> idmarca ] = $marca -> nombre;
        }

        //Volumen prueba
        $volumenPruebas = VolumenPrueba::find()->all();
        $vp = [];
        foreach ($volumenPruebas as $volumenPrueba) {
            $vp [ $volumenPrueba -> idVolumenPrueba ] = Yii::t('app', 'min') .' '. $volumenPrueba -> cantidad_min .' - '.Yii::t('app', 'min').' '.$volumenPrueba -> cantidad_max;
        }

        return $this->render('create', [
            'model' => $model, 'typeOfProducts' => $typesP, 'brands' => $brands, 'volumenPrueba' => $vp,
        ]);
    }

    
    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //dependencies
            //categories
            if ( isset ( $_POST['categories'] ) ) {
                
                $categories = $model -> productoCategorias;
                foreach ($categories as $category)
                    $category -> delete ();

                foreach ($_POST['categories'] as $index => $id_category) {                    
                    $product_category = new ProductoCategoria;
                    $product_category -> producto_id_fk = $model -> idproducto;
                    $product_category -> categoria_id_fk = $id_category;
                    $product_category -> save ();
                }
            }
            //features
            if ( isset ( $_POST['features'] ) ) {
                
                $categories = $model -> productoCaracteristicas;
                foreach ($categories as $category)
                    $category -> delete ();

                foreach ($_POST['features'] as $index => $id_feature) {                    
                    $product_feature = new ProductoCaracteristica;
                    $product_feature -> id_producto_fk = $model -> idproducto;
                    $product_feature -> id_caracteristica_fk = $id_feature;
                    $product_feature -> save ();
                }
            } 

            //tests
            if ( isset ( $_POST['tests'] ) ) {
                
                $tests = $model -> productoPruebas;
                foreach ($tests as $test)
                    $test -> delete ();

                foreach ($_POST['tests'] as $index => $id_test) {                    
                    $product_test = new ProductoPrueba;
                    $product_test -> producto_id_fk = $model -> idproducto;
                    $product_test -> prueba_id_fk = $id_test;
                    $product_test -> save ();
                }
            } 


        if ( isset ( $_FILES ) ) {
            
            foreach ($_FILES as $file ) {
               
               foreach ($file ['name'] as $key => $name) {
                   
                   if ( $name != "" ) {

                        $extension = explode (".", $name );
                        $extension = end ( $extension );
                        $extension = strtolower($extension);                        

                        //file type validation
                        if ($extension != 'jpeg' && $extension != 'jpg' && $extension != 'png' && $extension != 'gif')
                            throw new CHttpException(500, Yii::t ('error', 'FILE_TYPE_ERROR'));                        

                        $tmp = APP_UPLOADS . '/prod_' . $model -> idproducto;
                        if ( !is_dir( $tmp ) )
                            mkdir($tmp);

                        $nameimg  = md5 ( uniqid ( ) . "_" . $name ) . "." . $extension ;
                        $img = $tmp .'/'. $nameimg;
                        
                        if ( !move_uploaded_file( $file ['tmp_name'][$key] ,  $img) ) {
                            throw new CHttpException ( 500, Yii::t ('error', 'UPLOAD_ERROR') );                                 
                        } else {
                            $imagen = new ProductoImagen;
                            $imagen -> id_producto_fk = $model -> idproducto;
                            $imagen -> imagen = $nameimg;
                            $imagen -> portada = 0;
                            $imagen -> save ();
                        }                                            
                   }
               }
            }
        }                                     

            return $this->redirect(['view', 'id' => $model->idproducto]);
        }

        //type of products
        $typeProducts = TipoProducto::find()->all();
        $typesP = [];
        foreach ($typeProducts as $typeProduct) {
            $typesP [ $typeProduct -> idTipoProducto ] = $typeProduct -> nombre;
        }

        //Marks
        $marcas = Marca::find()->all();
        $brands = [];
        foreach ($marcas as $marca) {
            $brands [ $marca -> idmarca ] = $marca -> nombre;
        }

        //Volumen prueba
        $volumenPruebas = VolumenPrueba::find()->all();
        $vp = [];
        foreach ($volumenPruebas as $volumenPrueba) {
            $vp [ $volumenPrueba -> idVolumenPrueba ] = Yii::t('app', 'min') .' '. $volumenPrueba -> cantidad_min .' - '.Yii::t('app', 'min').' '.$volumenPrueba -> cantidad_max;
        }

        return $this->render('create', [
            'model' => $model, 'typeOfProducts' => $typesP, 'brands' => $brands, 'volumenPrueba' => $vp,
        ]);
    }

    /**
     * Deletes an existing Producto model.
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
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Search type
     *
     * @return type
     */
    public function actionSearchType ( $type )
    {

        $json = [];

        if ( $type == "categories" ) {
            
            if ( !isset ( $_GET['term']) )              
                $categories = Categoria::find()->all();
            else
                $categories = Categoria::find()
                    ->where(['like', 'nombre', $_GET['term'] ])
                    ->all();

            foreach ($categories as $category) {
                $json[] = [ 'id'=> $category -> idcategoria , 'text'=>$category -> nombre ];
            }

            echo json_encode($json);
            exit; 

        } else if ( $type == "features" ) {
            
            if ( !isset ( $_GET['term']) )              
                $features = Caracteristica::find()->all();
            else
                $features = Caracteristica::find()
                    ->where(['like', 'nombre', $_GET['term'] ])
                    ->all();

            foreach ($features as $feature) {
                $json[] = [ 'id'=> $feature -> idcaracteristica , 'text'=> $feature -> nombre ];
            }

            echo json_encode($json);
            exit; 

        } else if ( $type == "tests" ) {
            
            if ( !isset ( $_GET['term']) )              
                $tests = Prueba::find()->all();
            else
                $tests = Prueba::find()
                    ->where(['like', 'nombre', $_GET['term'] ])
                    ->all();

            foreach ($tests as $test) {
                $json[] = [ 'id'=> $test -> idprueba , 'text'=> $test -> nombre ];
            }

            echo json_encode($json);
            exit; 

        }        


        echo json_encode($json);
        exit;   
    }      
}

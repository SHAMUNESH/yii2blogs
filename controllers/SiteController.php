<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Blogs;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $blogs = Blogs::find()->all();
        return $this->render('home',['blogs' => $blogs]);
    }

    public function actionCreate(){
        $blogs = new Blogs();
        $blogs = new Blogs();
        $formData = yii::$app->request->post();
        if($blogs->load($formData)){
            if($blogs->save()){
                yii::$app->getSession()->setFlash('message','Blog Published Successfully!');
                return $this->redirect(['index']);
            }
            else{
                yii::$app->getSession()->setFlash('message','Blog Creation Failed!');
            }
        }
        return $this->render('create',['blogs' => $blogs]);
    }

    public function actionView($id){
       $blogs = Blogs::findOne($id);
       return $this->render('view',['blogs'=>$blogs]); 
    }

    public function actionUpdate($id){
      $blogs = Blogs::findOne($id);
      if($blogs->load(yii::$app->request->post()) && $blogs->save()){
        yii::$app->getSession()->setFlash('message','Blog Updated Successfully!');
        return $this->redirect(['index','id'=>$blogs->id]); 
      }
      else{
        return $this->render('update',['blogs'=>$blogs]); 
      }
       
    }

     public function actionDelete($id){
       $blogs = Blogs::findOne($id)->delete();
       if($blogs){
        yii::$app->getSession()->setFlash('message','Blog Deleted Successfully!');
        return $this->redirect(['index']); 
       }
   
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

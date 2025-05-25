<?php

namespace app\controllers;

use app\models\Application;
use app\models\Bilet;
use app\models\Category;
use app\models\Comments;
use app\models\News;
use app\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
        return $this->render('index');
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

    public function actionComend()
    {
        $model = new Comments();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goBack();
        }
        return $this->render('comend',
            [
                'model' => $model
            ]);
    }
    public function actionCategory(){
        $categorys = Category::find()->all();
        return $this->render('category', ['categorys'=>$categorys]);
    }

    public function actionNews($id)
    {
        $category = Category::findOne($id);
        $news = News::find()->where(['category_id' => $id])->all();

        return $this->render('news', [
            'category' => $category,
            'news' => $news,
        ]);
    }
    public function actionSignup()
    {
        $us = new SignupForm();
        if ($us->load(Yii::$app->request->post()) && $us->signup()) {
            return $this->goHome();
        }
        return $this->render('signup', [
            'us' => $us
        ]);
    }
    public function actionBilet()
    {
        $model = new Bilet();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id; // Добавляем user_id
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные успешно сохранены');
                return $this->refresh();
            }
        }

        return $this->render('bilet', [
            'model' => $model
        ]);
    }

}

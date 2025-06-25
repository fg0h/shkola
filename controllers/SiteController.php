<?php

namespace app\controllers;

use app\models\Raspisanie;
use app\models\Signup;
use app\models\Zapis;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Courses;
use app\models\Teachers;


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
                'only' => ['logout', 'admin'], // добавили admin
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['admin'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role == 2;
                        },
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

    public function actionAdmin()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 2) {
            throw new \yii\web\ForbiddenHttpException('Доступ запрещен');
        }

        $this->layout = 'admin';
        return $this->render('admin');
    }


    public function actionPrepod()
    {
        return $this->render('prepod');
    }

    public function actionSignup()
    {
        $model = new Signup();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionCourses()
    {
        $courses = Courses::find()->all();

        return $this->render('courses', [
            'courses' => $courses,
        ]);
    }

    public function actionTeachers()
    {
        $teachers = Teachers::find()->all();

        return $this->render('teachers', [
            'teachers' => $teachers
        ]);
    }

    public function actionRaspisanie()
    {
        $userId = Yii::$app->user->id;

        $raspisanie = \app\models\Raspisanie::find()
            ->where(['user_id' => $userId])
            ->orderBy(['den_nedeli' => SORT_ASC, 'time' => SORT_ASC])
            ->all();

        return $this->render('raspisanie', [
            'raspisanie' => $raspisanie,
        ]);
    }

    public function actionZapis()
    {
        $model = new Zapis();
        $courses = Courses::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Вы успешно записались на курс!');
                return $this->refresh();
            }
        }

        return $this->render('zapis', [
            'model' => $model,
            'courses' => $courses,
        ]);
    }

    public function actionCities($country)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $cities = Zapis::getCities();
        return isset($cities[$country]) ? $cities[$country] : [];
    }

}

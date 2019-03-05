<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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

    public function actionGraph()
    {
        return $this->render('graph');
    }

    public function actionGetjson()
    {
       $data = ' [{
        "country": "Lithuania",
            "litres": 501.9,
            "units": 250
        }, {
        "country": "Czech Republic",
            "litres": 301.9,
            "units": 222
        }, {
        "country": "Ireland",
            "litres": 201.1,
            "units": 170
        }, {
        "country": "Germany",
            "litres": 165.8,
            "units": 122
        }, {
        "country": "Australia",
            "litres": 139.9,
            "units": 99
        }, {
        "country": "Austria",
            "litres": 128.3,
            "units": 85
        }, {
        "country": "UK",
            "litres": 99,
            "units": 93
        }, {
        "country": "Belgium",
            "litres": 60,
            "units": 50
        }, {
        "country": "The Netherlands",
            "litres": 50,
            "units": 42
        }]';
       $array = json_decode($data);
      $json = json_encode($array);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $json;


    }
}

<?php

namespace app\controllers;

use DateTime;
use DateInterval;
use yii\web\Response;
use app\models\Sales;
use yii\web\Controller;
use app\models\VisitLog;
use yii\filters\VerbFilter;
use app\models\Subscription;
use yii\filters\AccessControl;
use app\models\SubscriptionType;
use app\models\SubscriptionStatus;
use yii\web\NotFoundHttpException;
use app\models\search\VisitLog as VisitLogSearch;

/**
 * VisitLogController implements the CRUD actions for VisitLog model.
 */
class VisitLogController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ]
                    ]
                ]
            ]
        );
    }

    /**
     * Lists all VisitLog models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VisitLogSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VisitLog model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VisitLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new VisitLog();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $sale = Sales::findOne($model->sale_id);
                if ($sale === null) {
                    throw new NotFoundHttpException('Продажа не найдена');
                }
                if ($sale->status_id === SubscriptionStatus::STATUS_ACTIVE) {
                    $subscribe = Subscription::findOne($sale->subscription_id);
                    //на кол-во посещений
                    if ($subscribe->type_id === SubscriptionType::TYPE_BY_VISITS) {
                        $countVisits = VisitLog::find()->where(['sale_id' => $model->sale_id])->count();
                        if ($countVisits > $subscribe->number_of_visits) {
                            $sale->status_id = SubscriptionStatus::STATUS_OVERDUE;
                            $sale->save();
                            $model->addError('sale_id', 'Посещения исчерпаны');
                        }
                    } else {
                        //проверка по времени
                        $dateIntervalString = 'P';
                        if ($subscribe->mount_amount) {
                            $dateIntervalString .= $subscribe->mount_amount . 'M';
                        }
                        if ($subscribe->day_amount) {
                            $dateIntervalString .= $subscribe->day_amount . 'D';
                        }
                        $dateEnd = (new DateTime($sale->date))->add(new DateInterval($dateIntervalString));
                        if ((new DateTime()) > $dateEnd) {
                            $sale->status_id = SubscriptionStatus::STATUS_OVERDUE;
                            $sale->save();
                            $model->addError('sale_id', 'Абонемент просрочен');
                        }
                    }
                } else {
                    $model->addError('sale_id', 'Абонемент неактивен');
                }

                $model->client_id = $sale->client_id;

                if (!$model->hasErrors() && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VisitLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VisitLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VisitLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return VisitLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VisitLog::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

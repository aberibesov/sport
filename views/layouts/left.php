<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Сотрудники', 'icon' => 'file-code-o', 'url' => ['/users']],
                    ['label' => 'Клиенты', 'icon' => 'file-code-o', 'url' => ['/clients']],
                    ['label' => 'Расписание', 'icon' => 'file-code-o', 'url' => ['/subscription']],
                    ['label' => 'Активные абонементы', 'icon' => 'file-code-o', 'url' => ['/sales']],
                    ['label' => 'Журнал посещений', 'icon' => 'file-code-o', 'url' => ['/visit-log']],
                    ['label' => 'Инвентарь', 'icon' => 'dashboard', 'url' => ['/nomenclature']],
                    ['label' => 'Залы', 'icon' => 'file-code-o', 'url' => ['/rooms']],
                    [
                        'label' => 'Справочники',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Тип абонемента', 'icon' => 'circle-o', 'url' => ['/subscription-type'],],
                            ['label' => 'Статус абонемента', 'icon' => 'circle-o', 'url' => ['/subscription-status'],],
                            ['label' => 'Список услуг', 'icon' => 'circle-o', 'url' => ['/serveces'],],
                            ['label' => 'Должности', 'icon' => 'circle-o', 'url' => '/position',],
                        ]
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest]
                ]
            ]
        ) ?>

    </section>

</aside>

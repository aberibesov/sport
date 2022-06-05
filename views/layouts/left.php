<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Сотрудники', 'icon' => 'file-code-o', 'url' => ['/users']],
                    ['label' => 'Клиенты', 'icon' => 'file-code-o', 'url' => ['/clients']],
                    ['label' => 'Расписание', 'icon' => 'file-code-o', 'url' => ['/schedule']],
                    ['label' => 'Продажи', 'icon' => 'file-code-o', 'url' => ['/sales']],
                    ['label' => 'Журнал посещений', 'icon' => 'file-code-o', 'url' => ['/visit-log']],
                    ['label' => 'Инвентарь в залах', 'icon' => 'file-code-o', 'url' => ['/inventory-in-room']],
                    [
                        'label' => 'Справочники',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Инвентарь', 'icon' => 'dashboard', 'url' => ['/nomenclature']],
                            ['label' => 'Залы', 'icon' => 'file-code-o', 'url' => ['/rooms']],
                            ['label' => 'Тип абонемента', 'icon' => 'circle-o', 'url' => ['/subscription-type']],
                            ['label' => 'Статус абонемента', 'icon' => 'circle-o', 'url' => ['/subscription-status']],
                            ['label' => 'Список услуг', 'icon' => 'circle-o', 'url' => ['/services']],
                            ['label' => 'Должности', 'icon' => 'circle-o', 'url' => ['/position']],
                            ['label' => 'Абонементы', 'icon' => 'file-code-o', 'url' => ['/subscription']]
                        ]
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest]
                ]
            ]
        ) ?>

    </section>

</aside>

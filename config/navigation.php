<?php

use \App\Enums\User\UserRole;

return [
    [
        'groups_route_name' => ['store_manager.main'],
        'index_route' => 'store_manager.main',
        'icon_class' => 'fa-calendar',
        'label' => 'alias_template.store_manager.dash_board.navigation.dash_board',
        'forbidden_roles' => [],
        'sub_list' => [],
    ],
    [
        'groups_route_name' => ['store_manager.members.*'],
        'index_route' => 'store_manager.members.index',
        'icon_class' => 'fa-group',
        'label' => 'alias_template.store_manager.member.title.manager_store',
        'forbidden_roles' => [],
        'sub_list' => [
            [
                'path_pattern' => ['members'],
                'route' => 'store_manager.members.index',
                'label' => 'alias_template.store_manager.member.navigation.member_list',
                'forbidden_roles' => [],
            ],
            [
                'path_pattern' => ['members/create'],
                'route' => 'store_manager.members.create',
                'label' => 'alias_template.store_manager.member.navigation.member_register',
                'forbidden_roles' => [],
            ],
            // [
            //    'path_pattern' => ['members/terms-of-service'],
            //    'route' => 'store_manager.members.terms.index',
            //    'label' => 'alias_template.store_manager.terms.navigation.terms_of_service',
            //    'forbidden_roles' => [UserRole::INTERVIEWEE],
            // ],
            [
                'path_pattern' => ['members/chip/logs'],
                'route' => 'store_manager.members.chip.logs',
                'label' => 'alias_template.store_manager.member.navigation.chip_logs',
                'forbidden_roles' => [],
            ],
        ],
    ],
    [
        'groups_route_name' => [
            'store_manager.tours.*',
            'store_manager.tournaments.*',
            'store_manager.structures.*',
            'store_manager.timers.*',
        ],
        'index_route' => 'store_manager.tours.index',
        'icon_class' => 'fa-flag-checkered',
        'label' => 'alias_template.store_manager.tournaments.navigation.tournaments',
        'forbidden_roles' => [UserRole::INTERVIEWEE],
        'sub_list' => [
            [
                'path_pattern' => ['tournaments*'],
                'route' => 'store_manager.tours.index',
                'label' => 'alias_template.store_manager.tournaments.navigation.event_list',
                'forbidden_roles' => [UserRole::INTERVIEWEE],
            ],
            [
                'path_pattern' => ['structures*'],
                'route' => 'store_manager.structures.index',
                'label' => 'alias_template.store_manager.tournaments.navigation.structures',
                'forbidden_roles' => [UserRole::INTERVIEWEE],
            ],
            [
                'path_pattern' => ['timers*'],
                'route' => 'store_manager.timers.index',
                'label' => 'timer.title',
                'forbidden_roles' => [UserRole::INTERVIEWEE],
            ],
        ],
    ],
];

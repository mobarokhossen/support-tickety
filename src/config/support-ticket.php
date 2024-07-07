<?php

return [

    'default_priority' => 2, // Normal
    'default_status' => 'open',

    'status' => [

        'open' => [
            'label' => 'Open',
            'color' => 'text-danger',
            'badge' => 'badge-danger',
            'background' => 'bg-danger'
        ],

        'in_progress' => [
            'label' => 'In Progress',
            'color' => 'text-primary',
            'badge' => 'badge-primary',
            'background' => 'bg-primary'
        ],

        'closed' => [
            'label' => 'Closed',
            'color' => 'text-success',
            'badge' => 'badge-success',
            'background' => 'bg-success'
        ],

        'resolved' => [
            'label' => 'Resolved',
            'color' => 'text-warning',
            'badge' => 'badge-warning',
            'background' => 'bg-warning'
        ]
    ],

    'priority' => [
        1 => [
            'label' => 'Low',
            'color' => 'text-gray',
            'badge' => 'badge-secondary',
            'background' => 'bg-secondary'
        ],
        2 => [
            'label' => 'Normal',
            'color' => 'text-primary',
            'badge' => 'badge-primary',
            'background' => 'bg-primary'
        ],
        3 => [
            'label' => 'High',
            'color' => 'text-warning',
            'badge' => 'badge-warning',
            'background' => 'bg-warning'
        ]
    ]

];

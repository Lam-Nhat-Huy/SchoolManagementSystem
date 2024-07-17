<?php
return [
    'module' => [
        [
            'title' => 'Bảng Điều Khiển',
            'icon' => 'fas fa-tachometer-alt',
            'name' => 'dashboard',
            'subModule' => [
                [
                    'title' => 'Thống Kê',
                    'route' => 'dashboard.index'
                ]
            ]
        ],
        [
            'title' => 'Tài khoản',
            'icon' => 'fas fa-users', // Icon cho quản lý thành viên
            'name' => 'user',
            'subModule' => [
                [
                    'title' => 'Thành Viên',
                    'route' => 'dashboard.index'
                ],
                [
                    'title' => 'Nhóm Thành Viên',
                    'route' => 'dashboard.index'
                ]
            ]
        ],
        [
            'title' => 'Lịch Dạy',
            'icon' => 'fas fa-calendar-alt', // Icon cho lịch dạy
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Lịch Dạy',
                    'route' => 'dashboard.index'
                ]
            ]
        ],
        [
            'title' => 'Sinh Viên',
            'icon' => 'fas fa-graduation-cap', // Icon cho học sinh
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Sinh Viên',
                    'route' => 'student.index'
                ]
            ]
        ],
        [
            'title' => 'Giáo Viên',
            'icon' => 'fas fa-chalkboard-teacher', // Icon cho giáo viên
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Giáo Viên',
                    'route' => 'dashboard.index'
                ]
            ]
        ],
        [
            'title' => 'Lớp Học',
            'icon' => 'fas fa-chalkboard', // Icon cho lớp học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Lớp Học',
                    'route' => 'class.index'
                ]
            ]
        ],
        [
            'title' => 'Môn Học',
            'icon' => 'fas fa-book', // Icon cho môn học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Môn Học',
                    'route' => 'subject.index'
                ]
            ]
        ],
        [
            'title' => 'Điểm Danh',
            'icon' => 'fas fa-check', // Icon cho điểm danh
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Điểm Danh',
                    'route' => 'dashboard.index'
                ]
            ]
        ]
    ]
];

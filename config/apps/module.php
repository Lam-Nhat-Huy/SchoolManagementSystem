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
                    'route' => 'account.index'
                ],
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
        ]
        ,
        [
            'title' => 'Lịch học',
            'icon' => 'fas fa-calendar', // Icon cho lịch học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Lịch học',
                    'route' => 'schedule.index'
                ]
            ]
        ]
        ,
        [
            'title' => 'Bảng Điểm',
            'icon' => 'fas fa-file-signature', // Icon cho Bảng Điểm
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Nhập Điểm',
                    'route' => 'enrollment.index'
                ],
                [
                    'title' => 'Bảng Điểm',
                    'route' => 'enrollment_student.index'
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
            'title' => 'Giảng Viên',
            'icon' => 'fas fa-chalkboard-teacher', // Icon cho giáo viên
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Giảng Viên',
                    'route' => 'teacher.index'
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
            'title' => 'Khóa Học',
            'icon' => 'fas fa-chalkboard-teacher', // Icon cho Khóa Học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Khóa Học',
                    'route' => 'course.index'
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
            'title' => 'Đánh Giá',
            'icon' => 'fas fa-pencil-alt', // Icon cho Đánh Giá
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Đánh Giá',
                    'route' => 'evaluation.index'
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
                ],
        [
            'title' => 'Hỗ Trợ Sinh Viên',
            'icon' => 'fab fa-rocketchat', // Icon cho Hỗ Trợ Sinh Viên
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Hỗ Trợ Sinh Viên',
                    'route' => 'traning_officer_chat.index'
                ]
            ]
        ]
    ]
];

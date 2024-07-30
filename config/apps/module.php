<?php
return [
    'module' => [
        [
            'user_role' => 1,
            'title' => 'Bảng Điều Khiển',
            'icon' => 'fas fa-tachometer-alt',
            'name' => 'dashboard',
            'subModule' => [
                [
                    'title' => 'Thống Kê',
                    'route' => 'dashboard.index',
                    'user_role' => 1
                ]
            ]
        ],
        [
            'user_role' => 1,
            'title' => 'Quản Trị Viên',
            'icon' => 'fas fa-users', // Icon cho quản lý thành viên
            'name' => 'user',
            'subModule' => [
                [
                    'title' => 'Tài Khoản',
                    'route' => 'account.index',
                    'user_role' => 1
                ],
            ]
        ],
        [
            'user_role' => [1],
            'title' => 'Cán Bộ Đào Tạo',
            'icon' => 'fas fa-hands-helping', // Icon cho quản lý CBDT
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Tài Khoản',
                    'route' => 'training_officer_account.index',
                    'user_role' => [1],
                ],
            ]
        ],
        [
            'user_role' => [1, 3],
            'title' => 'Lịch Dạy',
            'icon' => 'fas fa-calendar-alt', // Icon cho lịch dạy
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Lịch Dạy',
                    'route' => 'teaching_schedule.index',
                    'user_role' => [1, 3],
                ]
            ]
        ],
        [
            'user_role' => [1, 2, 4],
            'title' => 'Lịch học',
            'icon' => 'fas fa-calendar', // Icon cho lịch học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Lịch học',
                    'route' => 'schedule.index',
                    'user_role' => [1, 2, 4]
                ]
            ]
        ],
        [
            'user_role' => [1, 2, 3],
            'title' => 'Bảng Điểm',
            'icon' => 'fas fa-file-signature', // Icon cho Bảng Điểm
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Nhập Điểm',
                    'route' => 'enrollment.index',
                    'user_role' => [1, 3],
                ],
                [
                    'title' => 'Bảng Điểm',
                    'route' => 'enrollment_student.index',
                    'user_role' => 2,
                ]
            ]
        ],
        [
            'user_role' => 1,
            'title' => 'Sinh Viên',
            'icon' => 'fas fa-graduation-cap', // Icon cho học sinh
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Sinh Viên',
                    'route' => 'student.index',
                    'user_role' => 1
                ]
            ]
        ],
        [
            'user_role' => 1,
            'title' => 'Giảng Viên',
            'icon' => 'fas fa-chalkboard-teacher', // Icon cho giáo viên
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Giảng Viên',
                    'route' => 'teacher.index',
                    'user_role' => 1
                ]
            ]
        ],
        [
            'user_role' => 1,
            'title' => 'Lớp Học',
            'icon' => 'fas fa-chalkboard', // Icon cho lớp học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Lớp Học',
                    'route' => 'class.index',
                    'user_role' => 1
                ]
            ]
        ],
        [
            'user_role' => [1, 3],
            'title' => 'Ngành Học',
            'icon' => 'fas fa-chalkboard-teacher', // Icon cho Ngành học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Ngành Học',
                    'route' => 'course.index',
                    'user_role' => [1, 3],
                ]
            ]
        ],
        [
            'user_role' => 1,
            'title' => 'Môn Học',
            'icon' => 'fas fa-book', // Icon cho môn học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Môn Học',
                    'route' => 'subject.index',
                    'user_role' => 1
                ]
            ]
        ],
        [
            'user_role' => 1,
            'title' => 'Chuyên ngành',
            'icon' => 'fas  fa-graduation-cap', // Icon cho môn học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Chuyên ngành',
                    'route' => 'major.index',
                    'user_role' => 1
                ]
            ]
        ],
        [
            'user_role' => [1, 2, 3],
            'title' => 'Đánh Giá',
            'icon' => 'fas fa-pencil-alt', // Icon cho Đánh Giá
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Danh Sách Đánh Giá',
                    'route' => 'evaluation.index',
                    'user_role' => 1
                ],
                [
                    'title' => 'Đánh Giá Của Sinh Viên',
                    'route' => 'evaluationed.index',
                    'user_role' => [1, 3]
                ],
                [
                    'title' => 'Danh Sách Đánh Giá',
                    'route' => 'evaluation_by_student.index',
                    'user_role' => 2
                ]
            ]
        ],
        [
            'user_role' => [2, 4],
            'title' => 'Hỗ Trợ Sinh Viên',
            'icon' => 'fab fa-rocketchat', // Icon cho Hỗ Trợ Sinh Viên
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Hỗ Trợ Sinh Viên',
                    'route' => 'training_officer_chat.index',
                    'user_role' => 4
                ],
                [
                    'title' => 'Chat Với Phòng Đào Tạo',
                    'route' => 'student_chat.index',
                    'user_role' => 2
                ]
            ]
        ],
        [
            'user_role' => [2],
            'title' => 'Đăng ký môn học',
            'icon' => 'fas fa-book', // Icon cho môn học
            'name' => '',
            'subModule' => [
                [
                    'title' => 'Môn học',
                    'route' => 'get.course',
                    'user_role' => [2]
                ]
            ]
        ]
    ]
];

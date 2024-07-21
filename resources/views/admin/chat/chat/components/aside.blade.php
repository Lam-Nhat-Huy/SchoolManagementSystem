<div class="col-md-12 col-lg-5 col-xl-4 mb-4 mb-md-0 border-end {{ !empty($config['class']) ? 'hidden_for_phone' : '' }}">
    <div class="p-3">
        <div class="input-group rounded mb-3">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
        <div data-mdb-perfect-scrollbar-init>
            <ul class="list-unstyled mb-0 scroll-y-hidden" style="height: 500px;">
                @if (!empty($getAllChat))
                    @foreach ($getAllChat as $key => $item)
                        <li class="p-2 border-bottom">
                            <a href="{{ route('traning_officer_chat.detail', $item->last()->student_id) }}"
                                class="d-flex justify-content-between">
                                <div class="d-flex flex-row">
                                    <div>
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                            alt="avatar" class="d-flex align-self-center me-3" width="60">
                                        <span class="badge bg-success badge-dot"></span>
                                    </div>
                                    <div class="pt-1">
                                        <p class="fw-bold mb-0">
                                            {{ $item->last()->student_name }}
                                        </p>
                                        <p class="small text-muted truncate-text-1">
                                            {{ $item->last()->message }}
                                        </p>
                                    </div>
                                </div>
                                @if ($chatCounts[$key]['count_is_reply_zero'] > 0)
                                    <div class="pt-1">
                                        <span
                                            class="badge bg-danger rounded-pill float-end">{{ $chatCounts[$key]['count_is_reply_zero'] }}
                                        </span>
                                    </div>
                                @endif
                            </a>
                        </li>
                    @endforeach
                @else
                    <div class="text-center text-danger pt-3">
                        <h6>Không Có Đoạn Chat Nào</h6>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</div>

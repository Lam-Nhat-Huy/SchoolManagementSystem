<div class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <div id="chat3">
                <div class="card-body">
                    <div class="row">
                        @include('admin.chat.chat.components.aside')
                        <div class="col-lg-7 col-xl-8 {{ $config['class'] ? 'col-md-12' : 'col-md-6 ' }}">
                            <div class="border-bottom pb-3 d-flex align-items-center">
                                <a href="{{ route('traning_officer_chat.index') }}" class="text-dark me-3"
                                    style="font-size: 20px;"><i class="fas fa-angle-left"></i></a>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="ms-3">
                                    <div>
                                        {{ $getChatDetail->last()->student_name }}
                                    </div>
                                    <div>
                                        <p class="small text-muted mb-1">
                                            {{ \Carbon\Carbon::parse($getChatDetail->last()->sent_at)->locale('vi')->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-3 pe-3 scroll-y-hidden chat-container" id="chat-container" data-mdb-perfect-scrollbar-init>
                                {{-- Student --}}
                                @foreach ($getChatDetail as $item)
                                    <div class="d-flex flex-row justify-content-start">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                            alt="avatar 1" style="width: 45px; height: 100%;">
                                        <div>
                                            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">
                                                {{ $item->message }}</p>
                                            <p class="small ms-3 mb-3 rounded-3 text-muted float-end"
                                                style="font-size: 10px;">
                                                {{ $item->sent_at }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Officer --}}
                                @foreach ($getChatOffier as $item)
                                    <div class="d-flex flex-row justify-content-end">
                                        <div>
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                                {{ $item->message }}</p>
                                            <p class="small me-3 mb-3 rounded-3 text-muted" style="font-size: 10px;">
                                                {{ $item->sent_at }}</p>
                                        </div>
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                            alt="avatar 1" style="width: 45px; height: 100%;">
                                    </div>
                                @endforeach
                            </div>
                            <form action="{{ route('traning_officer_chat.store') }}" method="POST">
                                @csrf
                                <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                        alt="avatar 3" style="width: 40px; height: 100%;">
                                    <input type="text" name="message" class="form-control form-control-sm ms-3"
                                        id="exampleFormControlInput2" placeholder="Phản hồi của bạn">
                                    <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                                    <button type="submit" class="ms-3 border-0 bg-transparent"><i
                                            class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

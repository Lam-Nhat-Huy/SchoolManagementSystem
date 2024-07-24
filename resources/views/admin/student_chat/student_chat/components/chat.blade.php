<div class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <div id="chat3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="border-bottom pb-3 d-flex align-items-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="ms-3">
                                    <div>
                                        Phòng Đào Tạo
                                    </div>
                                    <div>
                                        <p class="small text-muted mb-1">
                                            Hoạt động từ 07h00 đến 12h00 & 13h30 đến 17h00
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-3 pe-3 scroll-y-hidden chat-container" id="chat-container"
                                data-mdb-perfect-scrollbar-init>

                                {{-- Officer --}}
                                @foreach ($getChatStudent as $item)
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

                                {{-- Student --}}
                                @foreach ($getChatOffier as $item)
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
                            </div>
                            <form action="{{ route('student_chat.store') }}" method="POST">
                                @csrf
                                <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                        alt="avatar 3" style="width: 40px; height: 100%;">
                                    <input type="text" name="message" class="form-control form-control-sm ms-3"
                                        id="exampleFormControlInput2" placeholder="Câu hỏi của bạn">
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

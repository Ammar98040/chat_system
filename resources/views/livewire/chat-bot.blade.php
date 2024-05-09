<div class="chat-application">
    <div class="content-area-wrapper container-xxl p-0">
        <!-- Main chat area -->
        <div class="content-full">
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row"></div>
                <div class="content-body">
                    <div class="body-content-overlay"></div>
                    <section class="chat-app-window">

                        <!-- Active Chat -->
                        <div class="active-chat">
                            <!-- Chat Header -->
                            <div class="chat-navbar">
                                <header class="chat-header">
                                    <div class="d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-lg-none me-1">
                                            <img width="50" height="50" src="{{ asset($bot->image) }}" alt="bot">
                                        </div>
                                        <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                            <img width="50" height="50" src="{{ asset($bot->image) }}" alt="bot">
                                        </div>
                                        <h6 class="mb-0">{{ $bot->name }}</h6>
                                    </div>
                                </header>
                            </div>
                            <!--/ Chat Header -->

                            <!-- User Chat messages -->
                            <div class="user-chats ps ps__rtl ps--active-y">
                                <div class="chats">
                                    <div class="chat">
                                        <div class="Quetion_box card">
                                            <div class="card-body">
                                                مرحباً بك أنا {{ $bot->info }}
                                                <div class="bot-Quetions mt-1">
                                                    @foreach ($botInfo as $info)
                                                    <button type="button" class="btn btn-outline-success round waves-effect mb-1" wire:click="ActiveSend('{{ $info->Question }}')">{{ $info->Question }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($botMessage as $msg)
                                        @if ($msg->sender_id == auth('member')->user()->id)
                                        <div class="chat-avatar">
                                            <span class="avatar box-shadow-1 cursor-pointer">
                                                @if (auth('member')->user()->profileImg == null)
                                                <img src="{{ asset('images/user.png') }}" width="50" height="50" alt="user">
                                                @else
                                                <img src="{{ asset(auth('member')->user()->profileImg) }}" width="50" height="50" alt="user">
                                                @endif
                                            </span>
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>{{ $msg->messages }}</p>
                                            </div>
                                        </div>
                                        @else
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img width="50" height="50" src="{{ asset($bot->image) }}" alt="bot">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <h5 class="text-muted">{{ $bot->name }}</h5>
                                                    <p>{{ $msg->messages }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        <button class="btnsendBot d-none" wire:click="botSendMsg"></button>
                                    </div>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; left: 681px; height: 354px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 153px;"></div>
                                </div>
                            </div>

                            <!-- User Chat messages -->

                            <!-- Submit Chat form -->
                            <form class="chat-app-form" wire:submit.prevent="sendMessage" enctype="multipart/form-data">
                                <div class="input-group input-group-merge me-1 form-send-message">
                                    <input type="text" class="form-control message" required placeholder="اختر السؤال والبوت سوف يساعدك في الإجابة عليه ..." wire:model="message">
                                </div>
                                <button type="submit" class="btn btn-primary send waves-effect waves-float waves-light" :disabled="$wire.message == ''">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send d-lg-none">
                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                    </svg>
                                    <span class="d-none d-lg-block">Send</span>
                                </button>
                            </form>


                            <!--/ Submit Chat form -->
                        </div>
                        <!--/ Active Chat -->
                    </section>
                </div>
            </div>
        </div>
        <!-- / Main chat area -->
    </div>
</div>

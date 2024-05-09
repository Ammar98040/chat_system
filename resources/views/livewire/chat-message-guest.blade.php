<div class="chat-application" wire:poll>
<div class="content-area-wrapper container-xxl p-0">
<!-- Main chat area -->
<div class="content-full">
<div class="content-wrapper container-xxl p-0">
<div class="content-header row"></div>
<div class="content-body">
    <div class="body-content-overlay"></div>
    <section class="chat-app-window">
        <!-- To load Conversation -->
        <div class="start-chat-area text-center {{ $activeChat == true ? 'd-none' : '' }}">
            <div class="mb-1 start-chat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            </div>
            <button class="btn btn-success waves-effect waves-float waves-light" wire:click="chatActive">انقر لبدء المحادثة</button>
        </div>
        <!--/ To load Conversation -->

        <!-- Active Chat -->
        <div class="active-chat {{ $activeChat == true ? 'd-block' : '' }}">
            <!-- Chat Header -->
            <div class="chat-navbar">
                <header class="chat-header">
                    <div class="d-flex align-items-center">
                        <div class="sidebar-toggle d-block d-lg-none me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu font-medium-5"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                        </div>
                        <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                            <i class="fa fa-user-group fa-2x"></i>
                        </div>
                        <h6 class="mb-0">جروب للدردشة العامة</h6>
                    </div>
                    <div class="d-flex align-items-center" wire:ignore>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call cursor-pointer d-sm-block d-none font-medium-2 me-1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video cursor-pointer d-sm-block d-none font-medium-2 me-1"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search cursor-pointer d-sm-block d-none font-medium-2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <div class="dropdown">
                            <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle waves-effect waves-float waves-light" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2" id="chat-header-actions"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                                <a class="dropdown-item" href="#">View Contact</a>
                                <a class="dropdown-item" href="#">Mute Notifications</a>
                                <a class="dropdown-item" href="#">Block Contact</a>
                                <a class="dropdown-item" href="#">Clear Chat</a>
                                <a class="dropdown-item" href="#">Report</a>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <!--/ Chat Header -->

            <!-- User Chat messages -->
            <div class="user-chats ps ps__rtl ps--active-y" x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); }}" x-intersect="scroll()" >
                <div class="chats">
                    @if ($msgBlock == null)
                        @foreach ($messagesGroups as $message)
                            <div class="divider">
                                <div class="divider-text">{{ $message->updated_at->format('Y-m-d h:i a') }}</div>
                            </div>
                            @if($message->sender_IP == Request::ip())
                                <div class="chat">
                                    <div class="chat-avatar">
                                        <span class="avatar box-shadow-1 cursor-pointer">
                                            <i class="fa fa-user fa-2x"></i>
                                        </span>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <h5 class="text-white">Guest-{{ Request::ip() }}</h5>
                                            @if (strpos($message->messages, 'files/images') !== false)
                                            <img class="img-fluid" src="{{ asset('/uploads/' .  $message->messages) }}" alt="img">
                                            @elseif(strpos($message->messages, 'files/pdf/') !== false)
                                                <a class="text-white" href="{{ asset('/uploads/' . $message->messages) }}" download> 
                                                    <i class='fa fa-file-text'></i>
                                                    {{ substr($message->messages, 9) }}
                                                </a>
                                            @else
                                                <p>{{ $message->messages }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="chat chat-left">
                                    <div class="chat-avatar">
                                        <span class="avatar box-shadow-1 cursor-pointer">
                                            <i class="fa fa-user fa-2x"></i>
                                        </span>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <h5 class="text-muted">Guest-{{ $message->sender_IP }}</h5>
                                            @if (strpos($message->messages, 'files/images') !== false)
                                            <img class="img-fluid" src="{{ asset('/uploads/' .  $message->messages) }}" alt="img">
                                            @elseif(strpos($message->messages, 'files/pdf') !== false)
                                                <a class="text-white" href="{{ asset('/uploads/' . $message->messages) }}" download> 
                                                    <i class='fa fa-file-text'></i>
                                                    {{ substr($message->messages, 9) }}
                                                </a>
                                            @else
                                                <p>{{ $message->messages }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                    <div class="chat">
                        <div class="alert alert-warning">
                            <div class="alert-body">
                                {{ $msgBlock }}
                            </div>
                        </div>
                    </div>           
                    @endif
                </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; left: 681px; height: 354px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 153px;"></div></div></div>
            <!-- User Chat messages -->

            <!-- Progress Bar -->
            <div
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
        >
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>

            <!-- Submit Chat form -->
            <form class="chat-app-form" wire:submit.prevent="sendMessage" enctype="multipart/form-data">
                <div class="input-group input-group-merge me-1 form-send-message">
                    
                    <input type="text" class="form-control message" required placeholder="Type your message or use speech to text" wire:model="message">

                    <span class="input-group-text">
                                <label for="attach-doc" class="attachment-icon form-label mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image cursor-pointer text-secondary"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        <input type="file" id="attach-doc" wire:model="attachFile" hidden=""> </label>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary send waves-effect waves-float waves-light" {{ $msgBlock == null ? '' : 'disabled' }}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send d-lg-none"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
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

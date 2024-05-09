<div class="chat-application" wire:poll>
    <div class="content-area-wrapper container-xxl p-0">
        <div class="sidebar-left">
            <div class="sidebar">
                <!-- Admin user profile area -->
                <div class="chat-profile-sidebar">
                    <header class="chat-profile-header">
                        <span class="close-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </span>
                    </header>
                </div>
                <!-- Chat Sidebar area -->
                <div class="sidebar-content {{ $activeSidebarMobile == true ? 'show' : '' }}">
                    <span class="sidebar-close-icon" wire:click="sidebarContentMobileclose">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </span>
                    <!-- Sidebar header start -->
                    <div class="chat-fixed-search">
                        <div class="d-flex align-items-center w-100">
                            <div class="sidebar-profile-toggle">
                                <div class="avatar avatar-border">
                                    @if( auth('member')->user()->profileImg)
                                        <img src="{{ asset('/' . auth('member')->user()->profileImg) }}" alt="user_avatar" height="42" width="42">
                                    @else
                                        <i class="fa fa-user fa-3x"></i>
                                    @endif
                                    <span class="avatar-status-online"></span>
                                </div>
                            </div>
                            <div class="input-group input-group-merge ms-1 w-100">
                                <span class="input-group-text round"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-muted"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                                <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat" aria-label="Search..." aria-describedby="chat-search">
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar header end -->
                
                    <!-- Sidebar Users start -->
                    <div id="users-list" class="chat-user-list-wrapper list-group ps ps__rtl ps--active-y">
                        <h4 class="chat-list-title">المجموعات</h4>
                        <ul class="chat-users-list chat-list media-list">
                            @forelse ($groups as $key => $group)
                                <li wire:click="group_target({{$group->id }})" wire:ignore>
                                    <span class="avatar">
                                        @if ($group->image != null)
                                            <img src="{{ asset('/' . $group->image) }}" height="42" width="42" alt="Generic placeholder image">
                                        @else    
                                            <i class="fa fa-user-group fa-2x"></i>
                                        @endif
                                        <span class="avatar-status-offline"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">{{ $group->name }}</h5>
                                        <p class="card-text text-truncate">
                                            {{ $group->country }}
                                        </p>
                                    </div>
                                    <div class="chat-meta text-nowrap">
                                        <span class="badge bg-success rounded-pill float-end">
                                            {{ $group->members()->count() }} عضو
                                        </span>
                                    </div>
                                </li>
                            @empty
                                <li class="no-results">
                                    <h6 class="mb-0">لا يوجد جروبات مضافة حتي الآن</h6>
                                </li>
                            @endforelse
                        </ul>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 119px; left: 353px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 15px;"></div></div></div>
                    <!-- Sidebar Users end -->
                </div>
                <!--/ Chat Sidebar area -->
            </div>
        </div>
        <!-- Main chat area -->
        <div class="content-right">
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row"></div>
                <div class="content-body">
                    <div class="body-content-overlay"></div>
                    <section class="chat-app-window">
                        <!-- To load Conversation -->
                        @if ($active_chat_messages == false)
                            <div class="start-chat-area text-center">
                                <div class="mb-1 start-chat-icon">
                                    @if ($groupInfo == null)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                    @else
                                        <img src="{{ asset('/' . $groupInfo->image) }}" alt="img">                                        
                                    @endif
                                </div>
                                @if ($groupInfo == null)
                                <h3 class="d-none d-sm-none d-md-block">اختر جروب لبدء المحادثة ...</h3>
                                <div class="d-sm-block d-lg-none" wire:click="sidebarContentMobileActive">
                                    <span class="btn btn-success waves-effect waves-float waves-light">ابدأ الدردشة</button>
                                </div>
                                @else    
                                    @if ($check_member == 0)
                                        <h3>{{ $groupInfo->name }}</h3>
                                        <button class="btn btn-success waves-effect waves-float waves-light" wire:click="send_join_group({{ $group_id }})">طلب انضمام</button>
                                    @else
                                        @if ($member != null)
                                            @if ($member->is_active == 1)
                                                <h3>{{ $groupInfo->name }}</h3>
                                                <button class="btn btn-success waves-effect waves-float waves-light" wire:click="chat_active({{ $group_id }})">انقر لبدء المحادثة</button> 
                                            @else
                                                <h3>{{ $groupInfo->name }}</h3>
                                                <div class="alert alert-primary">
                                                    <div class="alert-body">
                                                        <span>بإنتظار موافقة الأدمن ...</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div>
                        @endif
                        <!--/ To load Conversation -->
                
                        <!-- Active Chat -->
                        @if ($active_chat_messages == true)
                            <div class="active-chat">
                                <!-- Chat Header -->
                                <div class="chat-navbar">
                                    <header class="chat-header">
                                        <div class="d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none me-1" wire:click="sidebarContentMobileActive">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu font-medium-5"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                            </div>
                                            <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                                @if ($groupInfo->image == null)
                                                    <i class="fa fa-user-group fa-2x"></i>
                                                @else
                                                    <img style="width: 80px" src="{{ asset('/' . $groupInfo->image) }}" alt="img">
                                                @endif
                                            </div>
                                            <h6>{{ $groupInfo->name }}</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown" wire:ignore>
                                                <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle waves-effect waves-float waves-light" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2" id="chat-header-actions"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                                                    <a class="dropdown-item" href="#" wire:click="group_links_info_active">وصف المجموعة</a>
                                                    <a class="dropdown-item" href="#" wire:click="group_links_info_disabled">إظهار الدردشة</a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                </div>
                                <!--/ Chat Header -->
                    
                                <!-- User Chat messages -->
                                <div class="user-chats ps ps__rtl">
                                    <div class="chats">
                                        @if ($group_Links_active == false)
                                            @foreach ($messagesGroups as $message)
                                                <div class="divider">
                                                    <div class="divider-text">{{ $message->updated_at->format('Y-m-d h:i a') }}
                                                    </div>
                                                </div>
                                                @if ($message->sender_id == auth('member')->user()->id)
                                                    <div class="chat">
                                                        <div class="chat-avatar">
                                                            @if (auth('member')->user()->profileImg)
                                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                                    <img src="{{ asset('/' . auth('member')->user()->profileImg) }}" alt="avatar" height="36" width="36">
                                                                </span>
                                                            @else    
                                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                                    <i class="fa fa-user-group fa-3x"></i>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="chat-body">
                                                            <div class="chat-content">
                                                                <h5 class="text-white">{{ auth()->user()->name }}</h5>
                                                                @if (strpos($message->message, 'files/images') !== false)
                                                                <img class="img-fluid" src="{{ asset('/uploads/' .  $message->message) }}" alt="img">
                                                                @elseif(strpos($message->message, 'files/pdf') !== false)
                                                                    <a class="text-white" href="{{ asset('/uploads/' . $message->message) }}" download> 
                                                                        <i class='fa fa-file-text'></i>
                                                                        {{ substr($message->message, 9) }}
                                                                    </a>
                                                                @else
                                                                    <p>{{ $message->message }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                                @if ($message->sender_id != auth('member')->user()->id)
                                                    <div class="chat chat-left">
                                                        <div class="chat-avatar">
                                                            @if ($message->sender->profileImg)
                                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                                    <img src="{{ asset('/' . $message->sender->profileImg) }}" alt="avatar" height="36" width="36">
                                                                </span>
                                                            @else   
                                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                                    <i class="fa fa-user-group fa-3x"></i>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="chat-body">
                                                            <div class="chat-content">
                                                                <h5>{{ $message->sender->name }}</h5>
                                                                @if (strpos($message->message, 'files/images') !== false)
                                                                <img class="img-fluid" src="{{ asset('/uploads/' .  $message->message) }}" alt="img">
                                                                @else
                                                                    <p>{{ $message->message }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
            
                                            @endforeach
                                        @else
                                            <div class="chat">
                                                <div class="chat-body">
                                                    <div class="d-flex bg-white p-2">
                                                        {{ $groupInfo->group_links }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                        <div class="ps__rail-y" style="top: 0px; left: -7px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>
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

                                <!-- User Chat messages -->
                    
                                <!-- Submit Chat form -->
                                <form class="chat-app-form" wire:submit.prevent="sendMessage" enctype="multipart/form-data">
                                    <div class="input-group input-group-merge me-1 form-send-message">
                                        {{-- <span class="speech-to-text input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mic cursor-pointer"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg></span> --}}
                                        <input type="text" class="form-control message" required wire:model="message" placeholder="Type your message or use speech to text">
                                        <span class="input-group-text">
                                            <label for="attach-doc" class="attachment-icon form-label mb-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image cursor-pointer text-secondary"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                <input type="file" wire:model="attachFile" id="attach-doc" hidden=""> 
                                            </label>
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary send waves-effect waves-float waves-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send d-lg-none"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                        <span class="d-none d-lg-block">Send</span>
                                    </button>
                                </form>
                                <!--/ Submit Chat form -->
                            </div>
                        @endif
                        <!--/ Active Chat -->
                    </section>
                </div>
            </div>
        </div>
        <!-- / Main chat area -->
    </div>
</div>

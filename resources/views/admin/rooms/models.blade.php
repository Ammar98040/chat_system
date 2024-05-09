<!-- model add -->
<div class="modal fade text-start modal-success" id="addRoom">
    <div class="modal-dialog modal-dialog-centered">
        <form class="add-new-user modal-content pt-0" method="POST" action="{{ route('admin.room.store') }}" enctype="multipart/form-data">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مجموعة جديدة</h5>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-image">صورة المجموعة</label>
                    <input type="file" class="form-control" id="basic-icon-default-image" name="image">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-nama">اسم المجموعة</label>
                    <input type="text" class="form-control" id="basic-icon-default-nama" name="name">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-country">الدولة</label>
                    <input type="text" class="form-control" id="basic-icon-default-country" name="country">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="group_links">وصف المجموعة</label>
                    <textarea name="group_links" class="form-control" id="group_links" cols="5" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">حفظ</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </form>
    </div>
</div>

<!-- model update -->
<div class="modal fade text-start modal-success" id="editRoom">
    <div class="modal-dialog modal-dialog-centered">
        <form class="add-new-user modal-content pt-0" method="POST" action="{{ route('admin.room.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="id" name="id">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل المجموعة</h5>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-image">صورة المجموعة</label>
                    <input type="file" class="form-control" id="basic-icon-default-image" name="image">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-name">اسم االمجموعة</label>
                    <input type="text" class="name form-control" id="basic-icon-default-name" name="name">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-country">الدولة</label>
                    <input type="text" class="country form-control" id="basic-icon-default-country" name="country">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="group_links">وصف المجموعة</label>
                    <textarea name="group_links" class="form-control" id="group_links" cols="5" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">حفظ</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </form>
    </div>
</div>

<!-- model update -->
<div class="modal fade text-start modal-success" id="RoomInfo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">معلومات المجموعة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="groupInfo">  
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-dismiss="modal">حسناً</button>            
            </div>
        </div>
    </div>
</div>

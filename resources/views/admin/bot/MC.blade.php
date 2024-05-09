<div class="modal fade text-start" id="botCreate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">إنشاء بوت جديد</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.bot.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
    
                    <div class="mb-1">
                        <label class="form-label">اسم البوت</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
    
                    <div class="mb-1">
                        <label class="form-label">وصف البوت</label>
                        <input type="text" name="info" class="form-control" required>
                    </div>
    
                    <div class="mb-1">
                        <label class="form-label">صورة البوت</label>
                        <input type="file" class="form-control" name="image">
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect waves-float waves-light" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">حفظ البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- model delete -->
<div class="modal fade text-start modal-danger" aria-modal="true" wire:ignore.self  role="dialog" id="Mblock">
    <div class="modal-dialog modal-dialog-centered">
        <form class="add-new-user modal-content pt-0" wire:submit.prevent="blockMember">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تحذير !</h5>
            </div>
            <div class="modal-body">
                <p>هل تريد بالفعل حظر هذا العضو لن يمكنك التحدث إليه مرة أخرى ...</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">تأكيد</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </form>
    </div>
</div>    

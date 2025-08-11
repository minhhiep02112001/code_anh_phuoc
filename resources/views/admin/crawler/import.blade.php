<div class="modal fade" id="modal_form_import" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div
                style="width: 100%; padding: 15px; border-bottom: 1px solid #e5e5e5; position:relative;display: flex;justify-content:space-between; align-items: center;">
                <h3 class="modal-title" id="formModalLabel">Thông tin file import</h3>
                <div style="display: inline-block;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnSave">Submit</button>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="parent-upload" data-field="import" data-folder="import" data-disk="import">
                                    <input type="file" class="document_upload filepond upload-file" name="files">
                                </div>
                                <a href="" target="_blank">File mẫu</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

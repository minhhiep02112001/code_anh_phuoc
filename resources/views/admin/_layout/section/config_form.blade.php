<div class="modal fade" id="modal_form" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div
                style="width: 100%; padding: 15px; border-bottom: 1px solid #e5e5e5; position:relative;display: flex;justify-content:space-between; align-items: center;">
                <h3 class="modal-title" id="formModalLabel">Thông tin</h3>
                <div style="display: inline-block;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnSave">Submit</button>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    @yield('input_content')
                </form>
            </div>
        </div>
    </div>
</div>

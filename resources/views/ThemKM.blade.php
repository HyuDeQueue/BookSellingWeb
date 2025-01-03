@extends('master.admin')

@section('title', 'Thêm khuyến mãi')

@section('content')
<div class="container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Thêm Khuyến mãi</h2>
            <hr />
        </div>
        <form id="promotionForm">
            <div class="form_xemkhuyenmai border p-4 rounded">
                <div class="row g-3">
                    <div class="col-md-6 p-2">
                        <label for="author_name" class="form-label">Người tạo (*)</label>
                        <input type="text" class="form-control" name="author_name" id="author_name" required
                            value="[01]Admin" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="promotion_name" class="form-label">Tên khuyến mãi (*)</label>
                        <input type="text" class="form-control" name="promotion_name" id="promotion_name"
                            placeholder="Nhập vào tên khuyến mãi" required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="chanel_type" class="form-label">Loại kênh bán (*)</label>
                        <p class="sub fst-italic text-secondary p-0">
                            (giữ phím ctrl hoặc shift (hoặc kéo bằng chuột) để chọn nhiều
                            mục)
                        </p>
                        <select multiple name="chanel_type" id="chanel_type" class="form-select"
                            onchange="toggleBranchSelect()" required>
                            <option value="" selected>Chọn loại kênh bán...</option>
                            <option>[001] Cửa hàng</option>
                            <option>[002] Website</option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="branch_name" class="form-label">Chi nhánh (*)</label>
                        <p class="sub fst-italic text-secondary p-0">
                            (giữ phím ctrl hoặc shift (hoặc kéo bằng chuột) để chọn nhiều
                            mục)
                        </p>
                        <select multiple name="branch_name" id="branch_name" class="form-select" required>
                            <option value="" selected>Chọn chi nhánh...</option>
                            <option>[001] Chi nhánh Quận 1</option>
                            <option>[002] Chi nhánh Quận 2</option>
                            <option>[003] Chi nhánh Quận 3</option>
                        </select>
                    </div>
                    <div class="col-md-4 p-2">
                        <label for="create_date" class="form-label">Ngày tạo (*)</label>
                        <input type="date" class="form-control" name="create_date" id="create_date"
                            placeholder="Chọn ngày tạo..." required />
                    </div>
                    <div class="col-md-4 p-2">
                        <label for="start_date" class="form-label">Ngày bắt đầu (*)</label>
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            placeholder="Chọn ngày bắt đầu..." required />
                    </div>
                    <div class="col-md-4 p-2">
                        <label for="end_date" class="form-label">Ngày kết thúc (*)</label>
                        <input type="date" class="form-control" name="end_date" id="end_date"
                            placeholder="Chọn ngày kết thúc ..." required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="cost" class="form-label">Giá trị (*)</label>
                        <input type="number" class="form-control" name="cost" id="cost" placeholder="Nhập vào giá trị"
                            required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="price" class="form-label">Đơn từ (*)</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Nhập vào..."
                            required />
                    </div>
                    <div class="group_btn d-flex justify-content-end p-2">
                        <button class="btn btn_cancel me-3" id="btnCancel" type="button">
                            Hủy
                        </button>
                        <button type="button" class="btn btn_save" id="btnSave">
                            Lưu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="modal_Complete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm khuyến mãi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">Bạn đã tạo khuyến mãi thành công.</div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn_close" id="btnClose">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link href="{{ asset('assets/css/ThemKM.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/ThemKM.js') }}"></script>
@endpush
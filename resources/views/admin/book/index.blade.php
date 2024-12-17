@extends('master.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-book container-sm p-0">
    <div class="row">
        <div class="sidebar col-md-3 d-none d-md-block">
            <p class="fs-3 fw-bold">Sản phẩm</p>

            <!-- Số lượng trong kho -->
            <div class="filter_author bg-white p-3 rounded-2 mb-4">
                <label for="filter_author" class="form-label d-flex justify-content-between fw-bold ps-0"
                    id="headingOne">
                    Số lượng trong kho trên
                </label>

                <div class="ps-2">
                    <input class="form-control" id="filter_value" type="number" placeholder="Nhập số lượng tồn kho"
                        onchange="loadTableData()" />
                </div>
            </div>
            <!-- Thể loại -->
            <div class="filter_author bg-white p-3 rounded-2 mb-4">
                <label for="filter_author" class="form-label d-flex justify-content-between fw-bold ps-0"
                    id="headingTwo">
                    Thể loại
                </label>
                <div class="ps-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="genre" id="genreTravel" />
                        <label class="form-check-label" for="genreTravel">Sách du lịch</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="genre" id="genreStudy" />
                        <label class="form-check-label" for="genreStudy">Sách học tập</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="genre" id="genreChildren" />
                        <label class="form-check-label" for="genreChildren">Sách thiếu nhi</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile -->
        <div class="mobile_togger d-flex align-items-center d-md-none ms-3 my-3 p-0">
            <p class="mobile_title fs-2 fw-bold text-center w-100 m-0">
                SẢN PHẨM
            </p>
        </div>

        <!-- Content -->
        <div class="content col-md-9">
            <!-- Tìm kiếm -->
            <div class="group-top row d-flex justify-content-end">
                <div class="search col-md-6 d-flex mb-3">
                    <input type="text" class="form-control me-1" placeholder="Tên sách, tên tác giả, thể loại..." />
                    <button class="btn btn_search text-nowrap">Tìm kiếm</button>
                </div>
                <div class="group_button col-md-6 d-flex mb-3">
                    <!-- Button trigger modal filter mobile -->
                    <button type="button"
                        class="btn_filter d-flex align-items-center justify-content-center p-0 d-md-none"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="material-symbols-outlined d-md-none filter">
                            filter_alt
                        </span>
                    </button>
                    <!-- Button add/import -->
                    <div class="button d-flex justify-content-end w-100">
                        <button class="btn btn_add me-2 d-flex align-items-center text-nowrap" id="btnAdd">
                            <span class="material-symbols-outlined add"> add </span>
                            Thêm
                        </button>
                        <button class="btn btn_import d-flex align-items-center text-nowrap" id="btnImport"
                            type="button" data-bs-toggle="modal" data-bs-target="#modal_Import">
                            <span class="material-symbols-outlined import">
                                download
                            </span>
                            Tải lên
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table sản phẩm -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="serial" style="min-width: 40px">STT</th>
                            <th scope="book_title" style="min-width: 140px">Tên sách</th>
                            <th scope="author_name" style="min-width: 120px">Tác giả</th>
                            <th scope="quantity" style="min-width: 65px">SL</th>
                            <th scope="cost" style="min-width: 99px">Chi phí</th>
                            <th scope="price" style="min-width: 80px">Đơn giá</th>
                            <th scope="action" style="min-width: 104px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Trốn lên mái nhà để khóc</td>
                            <td>Lam</td>
                            <td>5</td>
                            <td>150,000</td>
                            <td>195,000</td>
                            <td>
                                <button type="button" class="btn_preview p-0" id="btnPreview">
                                    <span class="material-symbols-outlined details">visibility</span>
                                </button>
                                <button type="button" class="btn_edit p-0" id="btnEdit">
                                    <span class="material-symbols-outlined edit">border_color</span>
                                </button>
                                <button type="button" class="btn_delete p-0" id="btnDelete">
                                    <span class="material-symbols-outlined delete">delete</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Thêm các hàng sản phẩm khác -->
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Filter Mobile -->
<div class="modal modal-filter fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
                    Sản phẩm
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tác giả -->
                <div class="filter_author bg-white p-3 rounded-2 mb-4">
                    <form id="authorForm">
                        <div class="mb-3">
                            <label for="filter_author" class="form-label d-flex justify-content-between fw-bold">Tên
                                tác giả
                            </label>
                            <input class="form-control" list="author_name" name="filter_author" id="filter_author"
                                placeholder="Chọn tác giả" onchange="loadTableData()" />
                            <datalist class="author_name" id="author_name">
                                <option value="NXB Dân trí"></option>
                                <option value="NXB Kim Đồng"></option>
                                <option value="NXB Trẻ"></option>
                                <option value="NXB Văn học"></option>
                            </datalist>
                        </div>
                    </form>
                </div>
                <div class="accordion" id="accordionExample">
                    <!-- Số lượng trong kho -->
                    <div class="accordion-item filter_author bg-white p-3 rounded-2 mb-4">
                        <label for="filter_author" class="accordion-header form-label d-flex justify-content-between"
                            id="headingOne">
                            <button class="accordion-button fw-bold ps-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne">
                                Số lượng trong kho trên
                            </button>
                        </label>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ps-2">
                                <input class="form-control" id="filter_value" type="number"
                                    placeholder="Nhập số lượng tồn kho" onchange="loadTableData()" />
                            </div>
                        </div>
                    </div>
                    <!-- Thể loại -->
                    <div class="accordion-item filter_author bg-white p-3 rounded-2 mb-4">
                        <label for="filter_author" class="accordion-header form-label d-flex justify-content-between"
                            id="headingTwo">
                            <button class="accordion-button fw-bold ps-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo">
                                Thể loại
                            </button>
                        </label>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ps-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="genre" id="genreTravel" />
                                    <label class="form-check-label" for="genreTravel">Sách du lịch</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="genre" id="genreStudy" />
                                    <label class="form-check-label" for="genreStudy">Sách học tập</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="genre" id="genreChildren" />
                                    <label class="form-check-label" for="genreChildren">Sách thiếu nhi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_cancel" data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="button" class="btn btn_complete" data-bs-dismiss="modal">
                    Hoàn tất
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Sidebar -->

<!-- Modal Xóa sản phẩm -->
<div class="modal modal_delete fade" id="modal_Delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
                    Xóa sản phẩm
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                <p class="fst-italic">(Khi xóa, dữ liệu sẽ không được hoàn tác.)</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn_cancel me-4" data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="button" class="btn btn_agree" data-bs-dismiss="modal">
                    Đồng ý
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Import File Modal -->
<div class="modal modal_import" id="modal_Import">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tải lên file</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <input type="file" id="fileInput" class="form-control-file" />
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn_search" data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="button" class="btn btn_import">Tải lên</button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link href="{{ asset('assets/css/admin/book/index.css') }}" rel="stylesheet">
@endpush


@push('scripts')
<script src="{{ asset('assets/js/admin/book/index.js') }}"></script>
@endpush
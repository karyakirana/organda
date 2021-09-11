<x-crud.listTable>
    @if ($errors->any())
    <div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
        <div class="alert-icon">
            <i class="flaticon-warning"></i>
        </div>
        <div class="alert-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">
																		<i class="ki ki-close"></i>
																	</span>
            </button>
        </div>
    </div>
    @endif
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Transaksi Sticker</h3>
            </div>
            <div class="card-toolbar">
                <span>{{ $kode ?? '' }}</span>
            </div>
        </div>
        <form action="{{ route('sticker') }}" method="POST">
            @csrf

            <input type="text" name="idCustomer" hidden value="{{ $id_cust ?? '' }}">
            <input type="text" name="idPlatNomor" hidden value="{{ $idPlatNomor ?? '' }}">
            <input type="text" name="id" hidden value="{{ $id ?? '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tgl Pembuatan</label>
                        <input type="text" class="form-control tanggalan" name="tglSticker" autocomplete="off" value="{{ $tgl_sticker ?? '' }}">
                        <span class="form-text text-danger"></span>
                    </div>
                    <div class="col-lg-6">
                        <label>Tgl Berlaku</label>
                        <input type="text" class="form-control tanggalan" name="tglBerlaku" autocomplete="off" value="{{ $masa_berlaku ?? '' }}">
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Customer</label>
                        <input type="text" class="form-control" name="customer" id="customer" value="{!! $nama_customer ?? '' !!}" readonly>
                        <span class="form-text text-danger"></span>
                    </div>
                    <div class="col-lg-6">
                        <label>NOPOL</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="platNomor" autocomplete="off" readonly value="{{ $nopol_mobil ?? '' }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="btnCustomer">Plat Nomor</button>
                            </div>
                        </div>
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Perusahaan</label>
                        <input type="text" class="form-control" name="perusahaan" autocomplete="off" value="{{ $perusahaan ?? '' }}">
                        <span class="form-text text-danger"></span>
                    </div>
                    <div class="col-lg-6">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="buka" {{ ($status == 'buka') ? 'selected' : '' }}>Buka</option>
                            <option value="blokir" {{ ($status == 'blokir') ? 'selected' : '' }}>Blokir</option>
                        </select>
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="{{ $keterangan ?? '' }}">
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Print</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <x-modal-large id="modalCustomer">
        <table class="table table-bordered" id="tableCustomer">
            <thead>
            <tr>
                <td width="10%" class="text-center">ID</td>
                <td class="text-center">Customer</td>
                <td class="text-center">Jenis</td>
                <td class="text-center">NOPOL</td>
                <td class="none">Status</td>
                <td width="10%">Action</td>
            </tr>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
    </x-modal-large>

    @push('scripts')
        <script>
            var customDatePicker = function (){

                let arrows;
                if (KTUtil.isRTL()) {
                    arrows = {
                        leftArrow: '<i class="la la-angle-right"></i>',
                        rightArrow: '<i class="la la-angle-left"></i>'
                    }
                } else {
                    arrows = {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }

                let tanggalan = function (){
                    $('.tanggalan').datepicker({
                        rtl: KTUtil.isRTL(),
                        format: 'dd-M-yyyy',
                        todayHighlight: true,
                        orientation: "bottom left",
                        templates: arrows
                    });
                }

                return {
                    init : function (){
                        tanggalan();
                    }
                }
            }();

            jQuery(document).ready(function() {
                customDatePicker.init();
                ListData();
            });

            // add customer
            $('#btnCustomer').on('click', function (){
                $('#modalCustomer').modal('show');

            });

            // save Customer
            $('body').on('click', '#btnAddCustomer', function (){
                let dataEdit = $(this).data("value");
                $.ajax({
                    headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url : '{{ url('/') }}'+'/mobil/edit/'+dataEdit,
                    method: "GET",
                    dataType : "JSON",
                    success : function (data){
                        $('[name="idCustomer"]').val(data.id_cust);
                        $('[name="idPlatNomor"]').val(data.id_mobil);
                        $('[name="idPlatNomor"]').val(data.id_mobil);
                        $('[name="customer"]').val(data.customer.nama_cust);
                        $('[name="platNomor"]').val(data.nopol_mobil);
                        $('#modalCustomer').modal('hide');
                    },
                    error : function (jqXHR, textStatus, errorThrown)
                    {
                        swal.fire({
                            html: jqXHR.responseJSON.message+"<br><br>"+jqXHR.responseJSON.file+"<br><br>Line: "+jqXHR.responseJSON.line,
                        });
                    }
                });
            });

            function ListData()
            {
                $('#tableCustomer').DataTable({
                    order : [],
                    responsive : true,
                    ajax : {
                        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url : '{{ route('mobilList') }}',
                        method : 'PATCH'
                    },
                    columns : [
                        {data : 'id_mobil', orderable : false},
                        {data : 'customer'},
                        {data : 'jenis_mobil'},
                        {data : 'nopol_mobil'},
                        {data : 'status'},
                        {data : 'Action', responsivePriority: -1, className: "text-center"},
                    ],
                    columnDefs: [
                        {
                            targets : [-1],
                            orderable: false
                        }
                    ],
                });
            }

        </script>
    @endpush
</x-crud.listTable>

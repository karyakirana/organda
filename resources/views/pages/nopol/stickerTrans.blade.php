<x-metronics>
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Transaksi Sticker</h3>
            </div>
            <div class="card-toolbar">
                <span>{{ $kode ?? '' }}</span>
            </div>
        </div>
        <form action="#">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tgl Pembuatan</label>
                        <input type="text" class="form-control" name="tglSticker" autocomplete="off">
                        <span class="form-text text-danger"></span>
                    </div>
                    <div class="col-lg-6">
                        <label>Tgl Berlaku</label>
                        <input type="text" class="form-control" name="tglBerlaku" autocomplete="off">
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Customer</label>
                        <input type="text" class="form-control" name="customer" autocomplete="off">
                        <span class="form-text text-danger"></span>
                    </div>
                    <div class="col-lg-6">
                        <label>NOPOL</label>
                        <input type="text" class="form-control" name="platNomor" autocomplete="off">
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Perusahaan</label>
                        <input type="text" class="form-control" name="perusahaan" autocomplete="off">
                        <span class="form-text text-danger"></span>
                    </div>
                    <div class="col-lg-6">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="buka">Buka</option>
                            <option value="blokir">Blokir</option>
                        </select>
                        <span class="form-text text-danger"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" autocomplete="off">
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
</x-metronics>

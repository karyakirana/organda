<x-crud.listTable>
    <table class="table table-bordered" width="100%" id="listData">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Berlaku</th>
                <th>Customer</th>
                <th>Plat Nomor</th>
                <th>Perusahaan</th>
                <th>Status</th>
                <th class="none">Keterangan</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    @push('scripts')
        <script>

            $('body').on('click', '#btnEdit', function(){
                let editData = $(this).data("value");
                window.location.href = '{{ url('/') }}'+'/sticker/'+editData;
            });

            jQuery(document).ready(function() {
                ListData();
            });

            function ListData()
            {
                $('#listData').DataTable({
                    order : [],
                    responsive : true,
                    ajax : {
                        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url : '{{ url('/') }}'+'/sticker',
                        method : 'PATCH'
                    },
                    columns : [
                        {data : 'DT_RowIndex', orderable : false},
                        {data : 'tgl_sticker'},
                        {data : 'masa_berlaku'},
                        {data : 'customer'},
                        {data : 'mobil'},
                        {data : 'perusahaan'},
                        {data : 'status'},
                        {data : 'keterangan'},
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

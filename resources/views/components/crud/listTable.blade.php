<x-metronics>
    @prepend('styles')
        <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    @endprepend

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">{{ $title ?? '' }}</h3>
            </div>
            <div class="card-toolbar">
                {{ $toolbar ?? '' }}
            </div>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
        <div class="card-footer">
            {{ $footer ?? '' }}
        </div>
    </div>

    @prepend('scripts')
        <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <script>
            jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
                return this.flatten().reduce( function ( a, b ) {
                    if ( typeof a === 'string' ) {
                        a = a.replace(/[^\d.-]/g, '') * 1;
                    }
                    if ( typeof b === 'string' ) {
                        b = b.replace(/[^\d.-]/g, '') * 1;
                    }

                    return a + b;
                }, 0 );
            } );
        </script>
    @endprepend
</x-metronics>

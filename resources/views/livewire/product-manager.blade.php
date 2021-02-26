<div>
    <div class="modal fade" id="product-manager-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Product manager</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Désignation</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                        </div>
                        <div class="col-12">
                            <label for="">Prix</label>
                            <input type="number" step="0.01" class="form-control" wire:model.defer="price">
                        </div>
                        <div class="col-12">
                            <label for="">En stock</label>
                            <input type="number" class="form-control" wire:model.defer="in_stock">
                        </div>
                        <div class="col-12">
                            <label for="">Description</label>
                            <textarea wire:model.defer="description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="manage" class="btn btn-{{ $editProduct ? 'primary' : 'success' }}">{{ $editProduct ? 'Modifier' : 'Ajouter' }}</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
@push('app-js')
    <script>
        window.addEventListener('openProductModal', event => {
            $('#product-manager-modal').modal('show');
        })
        window.addEventListener('manageSuccess', event => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('#product-manager-modal').modal('hide');

            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
    </script>
@endpush

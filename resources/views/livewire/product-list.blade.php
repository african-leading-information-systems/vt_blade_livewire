<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des produits</h3>

                    <button class="btn btn-primary btn-sm ml-5" wire:click="$emit('createProductForm')">
                        Ajouter
                    </button>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input wire:model="search" type="text" class="form-control float-right" placeholder="Search">
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Désignation</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>En stock</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->in_stock }}</td>
                                <td>
                                    <x-ui.forms.button class="btn-primary btn-sm" wire:click="$emit('editProductForm', '{{ $product->id }}')">
                                        <span class="fas fa-pencil-alt"></span>
                                    </x-ui.forms.button>
                                    <x-ui.forms.button class="btn-danger btn-sm" wire:click="delete('{{ $product->id }}')">
                                        <span class="fas fa-trash-alt"></span>
                                    </x-ui.forms.button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

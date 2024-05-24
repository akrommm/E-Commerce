<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> LOGO
        </h5>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <a href="" data-toggle="modal" data-target="#tambah-data" class="float-right btn btn-dark"><i class="fas fa-plus"></i> Tambah Data</a>
            <table id="data-table" class="table table-datatable table-bordered">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px">NO</th>
                    <th style="color: white;" class="text-center">DESKRIPSI</th>
                    <th style="color: white;" width="90px" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_footer->sortByDesc('created_at')->values() as $footer)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <div>{!! $footer->text !!}</div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <x-template.button.edit-button url="admin/footer" id="{{ $footer->id }}" />
                                <x-template.button.delete-button url="admin/footer" id="{{ $footer->id }}" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Blog Category -->
    <div class="modal fade" id="tambah-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Deskripsi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/footer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>DESKRIPSI</label>
                                <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="summernote" cols="50" rows="7" required></textarea>
                                @error('text')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- End Modal Tambah Customer -->
</x-app>
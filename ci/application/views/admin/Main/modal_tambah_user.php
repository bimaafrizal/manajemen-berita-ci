<!-- Modal -->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('Manage_admin_18/simpandata', ['class' => 'formsimpan']) ?>
                <div class="pesan" style="display: none;"></div>
                <div class="form-group row">
                    <label for="email" class="col-sm-6 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaPengguna" class="col-sm-6 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                        <input type="text" name="namaPengguna" id="namaPengguna" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="peran" class="col-sm-6 col-form-label">Peran</label>
                    <select class="form-control" id="peran" name="peran">
                        <option value="1"> Admin </option>
                        <option value="2"> Contributtor </option>
                    </select>
                    <!-- <div class="col-sm-4">
                        <input type="text" name="peran" id="peran" class="form-control">
                    </div> -->
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-6 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="konfirmPass" class="col-sm-6 col-form-label">Konfirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="konfirmPass" id="konfirmPass" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        $('.pesan').html(response.error).show();
                    }
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        });
                        tampildatamahasiswa();
                        $('#modaltambah').modal('hide');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
            return false;
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
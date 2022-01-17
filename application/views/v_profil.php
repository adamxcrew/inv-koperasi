<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Profil Koperasi</h1>
<div class="card shadow">
    <!-- <div class="card-header">
        <h4>Form Profil</h4>
    </div> -->
    <form role="form" action="<?=base_url('setting/save');?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Koperasi</label>
                        <input type="hidden" name="idsetting" id="name" value="<?= _app('idsetting');?>">
                        <input type="text" class="form-control" name="name" value="<?= _app('name');?>" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    value="<?= _app('email');?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp" class="control-label">No. HP</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp"
                                    value="<?= _app('no_hp');?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin" class="control-label">Admin Koperasi</label>
                        <input type="text" class="form-control uppercase" name="admin" id="admin"
                            value="<?= _app('admin');?>" />
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Alamat lengkap</label>
                        <textarea name="address" id="address" cols="30" rows="3"
                            class="form-control"><?= _app('address'); ?></textarea>
                    </div>
                </div>
                <div class="col-md-5">
                    <div style="border:1px #eee solid;height:300px;">
                        <img src="<?=base_url('uploads/'._app('logo'));?>" alt="Logo" width="100%" height="100%">
                    </div>
                    <div class="form-group">
                        <label for="logo" class="control-label"></label>
                        <input type="file" class="form-control" name="logo" id="logo">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mb-2"><i class="fas fa-save"></i>
                SIMPAN</button>
        </div>
    </form>
</div>
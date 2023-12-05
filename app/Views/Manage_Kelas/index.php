<!-- Begin Page Content -->
<div class="container-fluid siswa">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
       
        </div>
        <div class="col-4">
        <!-- <button class="btn btn-sm btn-primary data-daterangepicker float-right">&nbsp; <i class="fas fa-calendar-alt mr-2"></i> Date &nbsp;</button>
           -->
    </div>
       
    </div>

    <!-- DataTales Example -->
    <div class="section-body ">
        <div class="row">
            <div class="col-7">
                <div class="col"></div>
                <div class="col-12">
                <div class="row mb-2">
                            <div class="col-4"></div>
                                <div class="col-2"></div>
                            <div class="col-2"></div>
                                <div class="col-4 text-right">
                                <div class="input-group">
                                    <input type="text" id="searchbox" class="form-control" placeholder="Cari Kelas">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <br>
                    <div class="card shadow mb-4">
                    <div class="card-header py-3"> 
                        <div class="row mb-2">
                                <div class="col-4">
                                        <h5 class="m-0 font-weight-bold text-black">Manajement Kelas</H5>  
                                    </div>
                                        <div class="col-2">
                                                <div class="input-group">
                                                </div></div>
                                            <div class="col-2"></div>
                                        <div class="col-4 text-right">
                                        <div class="input-group ">
                                            <select class="form-control kategori-filter" name="kategori_filter" id="kategori_filter">
                                                <option value="">Semua</option>
                                                <?php foreach( $kelas as $k) :?>
                                                <option value="<?= $k['nama_kelas']?>"><?= $k['nama_kelas'] ?></option>
                                            <?php endforeach ?>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                        <div class="card-body">
                        
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" width="100%" cellspacing="0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Nama Siswa</th>
                                            <th> Email</th>
                                            <th> Nama Kelas</th>
                                            <th width ="5px">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php $count = 0;foreach ($manage as $u) : ?>
                                                <tr>
                                                <td><?= ++$count ?></td>
                                                <td><?= $u['nama_siswa']; ?></td>
                                                <td><?= $u['email']; ?></td>
                                                <td><?= $u['nama_kelas']; ?></td>
                                                <td><div class="btn-group">
                                                            <button class="btn btn-sm btn btn-outline-light" style="color:#4169E1;" onclick="editdata(<?= $u['id_anggota']?>)">
                                                                <i class="fas fa-pen"></i>
                                                            </button>
                                                    
                                                            <button class=" btn btn-outline-light"onclick="deleted('<?= $u['id_anggota']?>','<?= $u['nama_siswa']?>')" title="Hapus Data"
                                                            style="color:#FF0000;"><i class=" fas fa-trash"></i></button>
                                                
                                            </td>
                                                </tr>
                                            <?php endforeach ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        
        <div class="col-5">
        <div class="col"></div>
                <div class="col-12">
                <div class="row mb-2">
                <div class="col-4"></div>
                 <div class="col-2">
                    <div class="col"></div>
                 </div>
                 <div class="col-2"></div>
                            <br>
                            <br>
                            <br>
                    <div class="card shadow mb-4" style="width: 32rem;">
                    <div class="card-header py-3"> 
                        <div class="row mb-2">
                             <div class="col-6">
                                <h5 class="m-0 font-weight-bold text-black">Tambah Siswa </H5>  
                            </div>
                             <div class="col-2"></div>
                             <div class="col-4 text-right"></div>
                         </div>
                     </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="kelas">Nama Siswa</label>
                                    <select id="idsiswa" name="idsiswa" class="form-control">
                                        <option > Select Siswa </option>
                                    <?php foreach( $siswa as $k) :?>
                                                <option value="<?= $k['id_siswa']?>"><?= $k['nama_siswa'] ?></option>
                                            <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback errorkelas"></div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputState">Status</label>
                                    <select id="idkelas" name="idkelas" class="form-control">
                                        <option > Select Kelas </option>
                                    <?php foreach( $kelas as $k) :?>
                                                <option value="<?= $k['id_kelas']?>"><?= $k['nama_kelas'] ?></option>
                                            <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback errorstatus"> </div>
                                </div>
                                  <br><br>
                                <div class="row">
                                     <button type="button" onclick="createsave()" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>                                          
        </div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>
   
            <!-- Edit Modal -->
    <div class="modal fade bd-example-modal-sm" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h6 class="modal-title font-weight-bold ">Edit Siswa</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form">
                        <input type="hidden" name="id" id="id1">
                                <div class="form-group">
                                    <label for="kelas">Nama Siswa</label>
                                    <select id="idsiswa1" name="idsiswa1" class="form-control ">
                                        <option> Select Siswa </option>
                                    <?php foreach( $siswa as $k) :?>
                                                <option value="<?= $k['id_siswa']?>"><?= $k['nama_siswa'] ?></option>
                                            <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback erroridsiswa1"></div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputState">Status</label>
                                    <select id="idkelas1" name="idkelas1" class="form-control">
                                        <option> Select Kelas </option>
                                    <?php foreach( $kelas as $k) :?>
                                                <option value="<?= $k['id_kelas']?>"><?= $k['nama_kelas'] ?></option>
                                            <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback erroridkelas1"> </div>
                                </div>
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="editsave()" class="btn btn-sm btn-primary ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Delete Modal -->
     <div class="modal fade" id="confirmation-dialog" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-body confirmation-dialog-notice"> Do you want to continue?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-shadow btn-confirmation-dialog-yes" data-dismiss="modal" data-url="javascript:;">
                        <i class="fa fa-trash m-r-5"></i> Yes
                    </button>
                    <button type="button" class="btn btn-secondary" id="" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete Modal -->

</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>


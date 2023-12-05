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
            <div class="col"></div>
            <div class="col-12">
              <div class="row mb-2">
                        <div class="col-4"></div>
                            <div class="col-2"></div>
                          <div class="col-2"></div>
                            <div class="col-4 text-right">
                            <div class="input-group">
                                <input type="text" id="searchbox" class="form-control" placeholder="Cari Siswa">
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
                                    <h4 class="m-0 font-weight-bold text-black">Daftar Siswa</H4>  
                                </div>
                                    <div class="col-2">
                                            <div class="input-group">
                                            </div></div>
                                        <div class="col-2"></div>
                                    <div class="col-4 text-right">
                                    <div class="btn-group group-action-area ">
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fas fa-plus-circle"></i> Tambah Siswa</a>
                                    
                                    </div>
                                    </div>
                                </div>
                        </div>
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table class="table table-striped dataTable" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> Nama Siswa</th>
                                        <th> NISN</th>
                                        <th> E-Mail</th>
                                        <th> Telephone</th>
                                        <th width ="5px">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $count = 0;foreach ($siswa as $u) : ?>
                                            <tr>
                                            <td><?= ++$count ?></td>
                                            <td><?= $u['nama_siswa']; ?></td>
                                           <td><?= $u['nisn']; ?></td>
                                           <td  ><?= $u['email']; ?></td>
                                            <td  ><?= $u['telephone']; ?></td>
                                            
                                            <td><div class="btn-group">
                                                        <button class="btn btn-sm btn btn-outline-light" style="color:#4169E1;" onclick="editdata(<?= $u['id_siswa']?>)">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                
                                                         <button class=" btn btn-outline-light"onclick="deleted(<?= $u['id_siswa']?>,'<?= $u['nama_siswa']?>')" title="Hapus Data"
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
    </div>
    <iframe id="print-summary-report" hidden></iframe>
    <!-- Tambah Modal -->
    <div class="modal fade bd-example-modal-lg" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h6 class="modal-title font-weight-bold ">Tambah Siswa</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required> 
                                <div class="invalid-feedback errorname">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" required>  
                                <div class="invalid-feedback errornisn">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>E-Mail</label>
                                <input type="text" class="form-control" id="email" name="email" required> 
                                <div class="invalid-feedback erroremail">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" required>  
                                <div class="invalid-feedback errortelephone">
                                </div>
                            </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" required>
                                <div class="invalid-feedback errortempatlahir">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label >Tanggal Lahir</label>
                                <input type="text" onfocus="(this.type='date')" onblur="this.type='text'"class="form-control" id="tgllahir" name="tgllahir" required>
                                <div class="invalid-feedback errortgllahir">
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select id="jeniskelamin" name="jeniskelamin" class="form-control">
                                <option value="L"> Laki - Laki</option>
                                <option value="P"> Perempuan </option>
                                </select>
                                <div class="invalid-feedback errorjeniskelamin"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label > Agama</label>
                                <select id="agama" name="agama" class="form-control">
                                <option value="Islam"> Islam</option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Kristen"> Kristen </option>
                                <option value="Budha"> Budha </option>
                                <option value="Hindu"> Hindu </option>
                                </select>
                                <div class="invalid-feedback erroragama"></div>
                            </div>
                        </div>
                        <div class="form-row">
                                <label >Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat"></textarea>
                                <div class="invalid-feedback erroralamat"></div>
                        </div>
                    </div>
                        <div class=" modal-footer">

                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="createsave()" class="btn btn-sm btn-primary ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- Edit Modal -->
    <div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="name1" name="name" required> 
                                <div class="invalid-feedback errorname1">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >NISN</label>
                                <input type="text" class="form-control" id="nisn1" name="nisn" required>  
                                <div class="invalid-feedback errornisn1">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>E-Mail</label>
                                <input type="text" class="form-control" id="email1" name="email" required> 
                                <div class="invalid-feedback erroremail1">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Telephone</label>
                                <input type="text" class="form-control" id="telephone1" name="telephone" required>  
                                <div class="invalid-feedback errortelephone1">
                                </div>
                            </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempatlahir" id="tempatlahir1" required>
                                <div class="invalid-feedback errortempatlahir1">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label >Tanggal Lahir</label>
                                <input type="text" onfocus="(this.type='date')" onblur="this.type='text'"class="form-control" id="tgllahir1" name="tgllahir" required>
                                <div class="invalid-feedback errortgllahir1">
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select id="jeniskelamin1" name="jeniskelamin" class="form-control">
                                <option value="L"> Laki - Laki</option>
                                <option value="P"> Perempuan </option>
                                </select>
                                <div class="invalid-feedback errorjeniskelamin1"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label > Agama</label>
                                <select id="agama1" name="agama" class="form-control">
                                <option value="Islam"> Islam</option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Kristen"> Kristen </option>
                                <option value="Budha"> Budha </option>
                                <option value="Hindu"> Hindu </option>
                                </select>
                                <div class="invalid-feedback erroragama1"></div>
                            </div>
                        </div>
                        <div class="form-row">
                                <label >Alamat</label>
                                <textarea class="form-control" id="alamat1" name="alamat"></textarea>
                                <div class="invalid-feedback erroralamat1"></div>
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


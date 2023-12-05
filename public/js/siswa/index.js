
$('.siswa').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -6 ],
            "orderable": false,
            "ordering": false
        }
        ],
      
    });
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    $('.kategori-filter').change(function(){
         table.fnFilter($(this).val(), -5);
        id = $('#kategori_filter').val();
         if (id == ''){
             id = 'undefined';
         }
      // console.log(id);
     });
   

     var all = table.fnGetNodes();

    });

function deleted(ids,nama){

    var nameToDelete = '<b>Are you sure to delete this data?</b><ol class="m-t-8 p-l-20">';
    nameToDelete += '<li>'+nama+'</li>';
    nameToDelete += '</ol>';
    confirmation(nameToDelete, 'doDelete("'+ids+'")');

}

function doDelete(id){
  
    $.ajax({
        url: base_url+"/siswa/delete",
        type: 'post',
        dataType: 'json',
        data: {id: id},
        async:false,
        success: function(data){
            //  console.log(data);
            location.reload(true);
        }
    });
    
}
function createsave(){
    var name = $('#name').val();
    var nisn = $('#nisn').val();
    var email = $('#email').val();
    var telephone = $('#telephone').val();
    var tempatlahir = $('#tempatlahir').val();
    var tgllahir = $('#tgllahir').val();
    var jeniskelamin = $('#jeniskelamin').val();
    var agama = $('#agama').val();
    var alamat = $('#alamat').val();
   
    $.ajax({
        url: base_url+"/siswa/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            name:name,
            nisn:nisn,
            email:email,
            telephone:telephone,
            tempatlahir:tempatlahir,
            tgllahir:tgllahir,
            jeniskelamin:jeniskelamin,
            agama:agama,
            alamat:alamat,
        },
        async:false,
        success: function(response) {
            // console.log(data);
            if(response.error){
                    let data = response.error;
                    if(data.errorname ){
                        $('#name').addClass('is-invalid');
                        $('.errorname').html(data.errorname);
                    }
                    else{
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    if(data.errornisn ){
                        $('#nisn').addClass('is-invalid');
                        $('.errornisn').html(data.errornisn);
                    }
                    else{
                        $('#nisn').removeClass('is-invalid');
                        $('#nisn').addClass('is-valid');
                    }
                    if(data.erroremail ){
                        $('#email').addClass('is-invalid');
                        $('.erroremail').html(data.erroremail);
                    }
                    else{
                        $('#email').removeClass('is-invalid');
                        $('#email').addClass('is-valid');
                    }
                    if(data.errortelephone ){
                        $('#telephone').addClass('is-invalid');
                        $('.errortelephone').html(data.errortelephone);
                    }
                    else{
                        $('#telephone').removeClass('is-invalid');
                        $('#telephone').addClass('is-valid');
                    }
                    if(data.errortempatlahir ){
                        $('#tempatlahir').addClass('is-invalid');
                        $('.errortempatlahir').html(data.errortempatlahir);
                    }
                    else{
                        $('#tampatlahir').removeClass('is-invalid');
                        $('#tempatlahir').addClass('is-valid');
                    }
                    if(data.errortgllahir ){
                        $('#tgllahir').addClass('is-invalid');
                        $('.errortgllahir').html(data.errortgllahir);
                    }
                    else{
                        $('#tgllahir').removeClass('is-invalid');
                        $('#tgllahir').addClass('is-valid');
                    }
                    if(data.errorjeniskelamin ){
                        $('#jeniskelamin').addClass('is-invalid');
                        $('.errorjeniskelamin').html(data.errorjeniskelamin);
                    }
                    else{
                        $('#jeniskelamin').removeClass('is-invalid');
                        $('#jeniskelamin').addClass('is-valid');
                    }
                    if(data.erroragama ){
                        $('#agama').addClass('is-invalid');
                        $('.erroragama').html(data.erroragama);
                    }
                    else{
                        $('#agama').removeClass('is-invalid');
                        $('#agama').addClass('is-valid');
                    }
                    if(data.erroralamat ){
                        $('#alamat').addClass('is-invalid');
                        $('.erroralamat').html(data.erroralamat);
                    }
                    else{
                        $('#alamat').removeClass('is-invalid');
                        $('#alamat').addClass('is-valid');
                    }
                    
            }
            else if(response.sukses){
                location.replace(base_url+'/siswa');
            }
        }
    }); 
    
}
function editdata(id){
    $.ajax({
        url: base_url+'/siswa/editdata',
        type: 'POST',
        ContentType: 'application/json',
        dataType: 'JSON',
        data: {id:id
        },
        success: function(data) {
                $('#id1').val(data['id_siswa']);
                $('#name1').val(data['nama_siswa']);
                $('#nisn1').val(data['nisn']);
                $('#email1').val(data['email']);
                $('#telephone1').val(data['telephone']);
                $('#tempatlahir1').val(data['tempat_lahir']);
                $('#tgllahir1').val(data['tanggal_lahir']);
                $('#jeniskelamin1').val(data['jenis_kelamin']);
                $('#agama1').val(data['agama']);
                $('#alamat1').val(data['alamat']);
                $("#modalEdit").modal("show");
       }});
}
function editsave(){
    var ids = $('#id1').val()
    var name = $('#name1').val();
    var nisn = $('#nisn1').val();
    var email = $('#email1').val();
    var telephone = $('#telephone1').val();
    var tempatlahir = $('#tempatlahir1').val();
    var tgllahir = $('#tgllahir1').val();
    var jeniskelamin = $('#jeniskelamin1').val();
    var agama = $('#agama1').val();
    var alamat = $('#alamat1').val();
    console.log(ids);
    $.ajax({
        url: base_url+"/siswa/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            name:name,
            nisn:nisn,
            email:email,
            telephone:telephone,
            tempatlahir:tempatlahir,
            tgllahir:tgllahir,
            jeniskelamin:jeniskelamin,
            agama:agama,
            alamat:alamat,
        },
        success: function(response) {   
            if(response.error){
                let data = response.error;
                if(data.errorname ){
                    $('#name1').addClass('is-invalid');
                    $('.errorname').html(data.errorname);
                }
                else{
                    $('#name1').removeClass('is-invalid');
                    $('#name1').addClass('is-valid');
                }
                if(data.errornisn ){
                    $('#nisn1').addClass('is-invalid');
                    $('.errornisn').html(data.errornisn);
                }
                else{
                    $('#nisn1').removeClass('is-invalid');
                    $('#nisn1').addClass('is-valid');
                }
                if(data.erroremail ){
                    $('#email1').addClass('is-invalid');
                    $('.erroremail').html(data.erroremail);
                }
                else{
                    $('#email1').removeClass('is-invalid');
                    $('#email1').addClass('is-valid');
                }
                if(data.errortelephone ){
                    $('#telephone1').addClass('is-invalid');
                    $('.errortelephone1').html(data.errortelephone);
                }
                else{
                    $('#telephone1').removeClass('is-invalid');
                    $('#telephone1').addClass('is-valid');
                }
                if(data.errortempatlahir ){
                    $('#tempatlahir1').addClass('is-invalid');
                    $('.errortempatlahir1').html(data.errortempatlahir);
                }
                else{
                    $('#tampatlahir').removeClass('is-invalid');
                    $('#tempatlahir').addClass('is-valid');
                }
                if(data.errortgllahir ){
                    $('#tgllahir1').addClass('is-invalid');
                    $('.errortgllahir1').html(data.errortgllahir);
                }
                else{
                    $('#tgllahir1').removeClass('is-invalid');
                    $('#tgllahir1').addClass('is-valid');
                }
                if(data.errorjeniskelamin ){
                    $('#jeniskelamin1').addClass('is-invalid');
                    $('.errorjeniskelamin1').html(data.errorjeniskelamin);
                }
                else{
                    $('#jeniskelamin1').removeClass('is-invalid');
                    $('#jeniskelamin1').addClass('is-valid');
                }
                if(data.erroragama ){
                    $('#agama1').addClass('is-invalid');
                    $('.erroragama1').html(data.erroragama);
                }
                else{
                    $('#agama1').removeClass('is-invalid');
                    $('#agama1').addClass('is-valid');
                }
                if(data.erroralamat ){
                    $('#alamat1').addClass('is-invalid');
                    $('.erroralamat1').html(data.erroralamat);
                }
                else{
                    $('#alamat1').removeClass('is-invalid');
                    $('#alamat1').addClass('is-valid');
                }
        }
        else if(response.sukses){
            location.replace(base_url+'/siswa');
        }
        }
    });
}




$('.siswa').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -5 ],
            "orderable": false,
            "ordering": false
        }
        ],
      
    });
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    $('.kategori-filter').change(function(){
         table.fnFilter($(this).val(), -2);
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
        url: base_url+"/manage/delete",
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
    var idsiswa = $('#idsiswa').val();
    var idkelas = $('#idkelas').val();
   
    $.ajax({
        url: base_url+"/manage/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            idsiswa:idsiswa,
            idkelas:idkelas,
        },
        async:false,
        success: function(response) {
            // console.log(data);
            if(response.error){
                    let data = response.error;
                    if(data.errorname ){
                        $('#idsiswa').addClass('is-invalid');
                        $('.erroridsiswa').html(data.erroridsiswa);
                    }
                    else{
                        $('#idsiswa').removeClass('is-invalid');
                        $('#idsiswa').addClass('is-valid');
                    }
                    if(data.errornidkelas ){
                        $('#idkelas').addClass('is-invalid');
                        $('.erroridkelas').html(data.erroridkelas);
                    }
                    else{
                        $('#idkelas').removeClass('is-invalid');
                        $('#idkelas').addClass('is-valid');
                    }
                    
            }
            else if(response.sukses){
                location.replace(base_url+'/manage');
            }
        }
    }); 
    
}
function editdata(id){
    $.ajax({
        url: base_url+'/manage/editdata',
        type: 'POST',
        ContentType: 'application/json',
        dataType: 'JSON',
        data: {id:id
        },
        success: function(data) {
                $('#id1').val(data['id_siswa']);
                $('#idkelas1').val(data['id_siswa']);
                $('#idsiswa1').val(data['id_kelas']);
                $("#modalEdit").modal("show");
       }});
}
function editsave(){
    var ids = $('#id1').val()
    var idsiswa = $('#idsiswa1').val();
    var idkelas = $('#idkelas1').val();
    console.log(ids);
    $.ajax({
        url: base_url+"/manage/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            idsiswa:idsiswa,
            idkelas:idkelas,
        },
        success: function(response) {   
            if(response.error){
                let data = response.error;
                if(data.errorname ){
                    $('#idsiswa1').addClass('is-invalid');
                    $('.erroridsiswa1').html(data.erroridsiswa);
                }
                else{
                    $('#idsiswa1').removeClass('is-invalid');
                    $('#idsiswa1').addClass('is-valid');
                }
                if(data.errornidkelas ){
                    $('#idkelas1').addClass('is-invalid');
                    $('.erroridkelas1').html(data.erroridkelas);
                }
                else{
                    $('#idkelas1').removeClass('is-invalid');
                    $('#idkelas1').addClass('is-valid');
                }
        }
        else if(response.sukses){
            location.replace(base_url+'/manage');
        }
        }
    });
}



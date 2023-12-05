
$('.siswa').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -3 ],
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
        url: base_url+"/kelas/delete",
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
    var kelas = $('#kelas').val();
    var status = $('#status').val();
   
    $.ajax({
        url: base_url+"/kelas/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            kelas:kelas,
            status:status,
        },
        async:false,
        success: function(response) {
            // console.log(data);
            if(response.error){
                    let data = response.error;
                    if(data.errorkelas ){
                        $('#kelas').addClass('is-invalid');
                        $('.errorkelas').html(data.errorkelas);
                    }
                    else{
                        $('#kelas').removeClass('is-invalid');
                        $('#kelas').addClass('is-valid');
                    }
                    if(data.errorstatus ){
                        $('#status').addClass('is-invalid');
                        $('.errorstatus').html(data.errorstatus);
                    }
                    else{
                        $('#status').removeClass('is-invalid');
                        $('#status').addClass('is-valid');
                    }
                    
                    
            }
            else if(response.sukses){
                location.replace(base_url+'/kelas');
            }
        }
    }); 
    
}
function editdata(id){
    $.ajax({
        url: base_url+'/kelas/editdata',
        type: 'POST',
        ContentType: 'application/json',
        dataType: 'JSON',
        data: {id:id
        },
        success: function(data) {
                $('#id1').val(data['id_kelas']);
                $('#kelas1').val(data['nama_kelas']);
                $('#status1').val(data['status_kelas']);
                $("#modalEdit").modal("show");
       }});
}
function editsave(){
    var ids = $('#id1').val()
    var kelas = $('#kelas1').val();
    var status = $('#status1').val();
    console.log(ids);
    $.ajax({
        url: base_url+"/kelas/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            kelas:kelas,
            status:status,
        },
        success: function(response) {   
            if(response.error){
                let data = response.error;
                if(data.errorname ){
                    $('#kelas1').addClass('is-invalid');
                    $('.errorkelas').html(data.errorkelas);
                }
                else{
                    $('#kelas1').removeClass('is-invalid');
                    $('#kelas1').addClass('is-valid');
                }
                if(data.errorstatus ){
                    $('#status1').addClass('is-invalid');
                    $('.errorstatus').html(data.errorstatus);
                }
                else{
                    $('#status1').removeClass('is-invalid');
                    $('#status1').addClass('is-valid');
                }
                
        }
        else if(response.sukses){
            location.replace(base_url+'/kelas');
        }
        }
    });
}



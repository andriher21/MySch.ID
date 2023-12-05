$('.autofill2').keyup( function()
{
    var harga_beli = $('#hargabeli').val();
    var diskon = $('#diskon').val();
    var qty = $('#qty').val();
    harga_beli = parseInt(harga_beli);
    diskon = parseInt(diskon);
    qty = parseInt(qty);
    var totalrp = harga_beli*qty;
    var diskonrp = totalrp*(diskon/100);
    $('#diskonrp').val(Math.round(diskonrp));
    $('#totalrp').val(totalrp);
});
function save(notransaksi){
    var kodebrg = $('#kodebrg').val();
    var kodespl = $('#kodespl').val();
    var hargabeli = $('#hargabeli').val();
    var qty = $('#qty').val();
    var diskon = $('#diskon').val();
    var diskonrp = $('#diskonrp').val();
    var totalrp = $('#totalrp').val();
    $.ajax({
        url: base_url+"/pembelian/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            notransaksi:notransaksi,
            kodebrg:kodebrg,
            kodespl:kodespl,
            hargabeli:hargabeli,
            qty:qty,
            diskon:diskon,
            diskonrp:diskonrp,
            totalrp:totalrp
        },
        success: function(response) {
            if(response.error){
                let data = response.error;
                if(data.errorname ){
                    $('#kodebrg').addClass('is-invalid');
                    $('.errorkodebrg').html(data.errorkodebrg);
                }
                else{
                    $('#kodebrg').removeClass('is-invalid');
                    $('#kodebrg').addClass('is-valid');
                }
                if(data.errorkodeslp ){
                    $('#kodespl').addClass('is-invalid');
                    $('.errorkodespl').html(data.errorkodespl);
                }
                else{
                    $('#kodespl').removeClass('is-invalid');
                    $('#kodespl').addClass('is-valid');
                }
                if(data.errorhargabeli ){
                    $('#hargabeli').addClass('is-invalid');
                    $('.errorhargabeli').html(data.errorhargabeli);
                }
                else{
                    $('#hargabeli').removeClass('is-invalid');
                    $('#hargabeli').addClass('is-valid');
                }
                if(data.errorqty ){
                    $('#qty').addClass('is-invalid');
                    $('.errorqty').html(data.errorqty);
                }
                else{
                    $('#qty').removeClass('is-invalid');
                    $('#qty').addClass('is-valid');
                }
                if(data.errordiskon ){
                    $('#diskon').addClass('is-invalid');
                    $('.errordiskon').html(data.errordiskon);
                }
                else{
                    $('#diskon').removeClass('is-invalid');
                    $('#diskon').addClass('is-valid');
                }
                if(data.errordiskonrp ){
                    $('#diskonrp').addClass('is-invalid');
                    $('.errordiskonrp').html(data.errordiskonrp);
                }
                else{
                    $('#diskonrp').removeClass('is-invalid');
                    $('#diskonrp').addClass('is-valid');
                }
                if(data.errortotalrp ){
                    $('#totalrp').addClass('is-invalid');
                    $('.errortotalrp').html(data.errortotalrp);
                }
                else{
                    $('#totalrp').removeClass('is-invalid');
                    $('#totalrp').addClass('is-valid');
                }
        }
        else if(response.sukses){
            location.replace(base_url+'/pembelian');
        }
        }
    });
}
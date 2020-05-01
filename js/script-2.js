var container_keterampilan = document.getElementById('container_keterampilan');
var nama_keterampilan = document.getElementById('nama_keterampilan');
var btn_keterampilan = document.getElementById('btn_keterampilan');
var ul_keterampilan = document.getElementById('ul_keterampilan');
var id_keterampilan = document.getElementById('id_keterampilan');
var hapus_keterampilan = document.getElementById('hapus_keterampilan');




btn_keterampilan.addEventListener('click',function(){
    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            ul_keterampilan.innerHTML = xhr.responseText;
            nama_keterampilan.value='';
        }
    }

    

    //eksekusi ajax
     xhr.open('GET','ajax/keterampilan.php?keterampilan=' + nama_keterampilan.value + '&id=' + id_keterampilan.value,true);
     xhr.send();
});




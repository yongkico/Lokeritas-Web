var container_keterampilan = document.getElementById('container_keterampilan');
var nama_keterampilan = document.getElementById('nama_keterampilan');
var btn_keterampilan = document.getElementById('btn_keterampilan');
var id_email = document.getElementById('id_email');
var btn_hapus_keterampilan = document.getElementById('btn_hapus_keterampilan');
var daftar_keterampilan = document.getElementById('dft_keterampilan');
// daftar_keterampilan = daftar_keterampilan + '';
// var daftar = daftar_keterampilan.split(",");




btn_keterampilan.addEventListener('click',function(){
    
    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            ul_keterampilan.innerHTML = xhr.responseText;            
        }
    }

    

    //eksekusi ajax
     xhr.open('GET','ajax/keterampilan.php?keterampilan=' + nama_keterampilan.value + '&email=' + id_email.value,true);
     xhr.send();
});

// btn_hapus_keterampilan.addEventListener('click',function(){
//      //buat object ajax
//      var xhr = new XMLHttpRequest();

//      //cek kesiapan ajax
//      xhr.onreadystatechange = function(){
//          if(xhr.readyState == 4 && xhr.status == 200){
//              ul_keterampilan.innerHTML = xhr.responseText;
//              nama_keterampilan.value='';
//          }
//      }
 
     
 
//      //eksekusi ajax
//       xhr.open('GET','ajax/hapus_keterampilan.php?email=' + id_email.value,true);
//       xhr.send();
// });







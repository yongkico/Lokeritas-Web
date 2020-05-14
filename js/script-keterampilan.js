var keterampilan = document.getElementById("keterampilanku"); 
var btnKeterampilan = document.getElementById("btnKeterampilan");
var daftarKeterampilan = document.getElementById("daftarKeterampilan");
var email = document.getElementById("emailku");


btnKeterampilan.addEventListener('click',function(){
    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            daftarKeterampilan.innerHTML = xhr.responseText;            
        }
    }    

    //eksekusi ajax
     xhr.open('GET','ajax/tambah_keterampilan.php?keterampilan=' + keterampilan.value + '&email=' + email.value,true);
     xhr.send();
});









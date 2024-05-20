window.onload = function() {
    var div3 = document.getElementById("clients");
    var div2 = document.getElementById("admin");
    var div1 = document.getElementById("services");
    var div4 = document.getElementById("taches");

    
    div1.classList.add("wearein");
    div2.classList.remove("wearein");
    div3.classList.remove("wearein");
    div4.classList.remove("wearein");
    console.log("Document ready");
    console.log("Document ready");
$(document).ready(function(){
    console.log("Document ready");
    $("#myLink").click(function(e){
        e.preventDefault(); 
        var id = $(this).data("id"); 
        $.ajax({
            type: "GET",
            url: "factoure.php",
            data: { id: id }, 
            success: function(response){
                
                window.location.href = "pdf_viewer.php?pdf_content=" + encodeURIComponent(response);
                console.log(id)
            }
        });
    });
});



};
var pagenum = document.getElementById('numpage').innerHTML;
var thenumis = parseInt(pagenum,10)
console.log(thenumis);
var ofsetval = 8;
            $('#morebtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./servindex/getmore.php",
                    data : {myvar : ofsetval},
                    dataType : "html",
                    success : function(data){
                        const $tbodyclinet = $('#tbodyclinet');
                        $tbodyclinet.html(data);
                        thenumis +=1;
                        const $numpageis = $('#numpage');
                        $numpageis.html(thenumis)
                        const deleteLinks = document.querySelectorAll('#deleteLink');
                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                               
                                event.preventDefault();
                                
                                
                                overlay.style.display = 'block';
                                confirmationDialog.style.display = 'flex';
                            });
                        });
                    }
                });
                ofsetval += 7;
                
                
            });
            $('#lessbtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./servindex/getless.php",
                    data : {myvar : ofsetval},
                    dataType : "html",
                    success : function(data){
                        const $tbodyclinet = $('#tbodyclinet');
                        $tbodyclinet.html(data);
                        thenumis =1;
                        const $numpageis = $('#numpage');
                        $numpageis.html(thenumis)
                        const deleteLinks = document.querySelectorAll('#deleteLink');
                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                               
                                event.preventDefault();
                                
                                
                                overlay.style.display = 'block';
                                confirmationDialog.style.display = 'flex';
                            });
                        });
                    }
                });
                ofsetval = 8;
                
                
            });


            $('#serch').on('input' ,function () {
                const inputval = $(this).val();
                $.ajax({
                    type:"get",
                    url : "./servindex/serachbyname.php",
                    data : {sername : inputval},
                    dataType : "html",
                    success : function(data){
                        const $tbodycline = $('#tbodyclinet');
                        $tbodycline.html(data);
                        thenumis =1;
                        const $numpageis = $('#numpage');
                        $numpageis.html(thenumis)
                        const deleteLinks = document.querySelectorAll('#deleteLink');
                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                               
                                event.preventDefault();
                                
                                
                                overlay.style.display = 'block';
                                confirmationDialog.style.display = 'flex';
                            });
                        });
                    }
                });
            
            });
            const overlay = document.getElementById('overlay');
const confirmationDialog = document.getElementById('confirmationDialog');
const confirmButton = document.getElementById('confirmButton');
const cancelButton = document.getElementById('cancelButton');
const deleteLink = document.getElementById('deleteLink');


const deleteLinks = document.querySelectorAll('#deleteLink');


deleteLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
       
        event.preventDefault();
        
        
        overlay.style.display = 'block';
        confirmationDialog.style.display = 'flex';
    });
});


confirmButton.addEventListener('click', function() {
    overlay.style.display = 'none';
    confirmationDialog.style.display = 'none';
    window.location.href = deleteLink.href;
});


cancelButton.addEventListener('click', function() {
    
    overlay.style.display = 'none';
    confirmationDialog.style.display = 'none';
});


var pagenum = document.getElementById('numpage').innerHTML;
var thenumis = parseInt(pagenum,10)
console.log(thenumis);
var ofsetval = 8;
            $('#morebtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./clientindex/getmorecl.php",
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
                    url : "./clientindex/getlesscl.php",
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
                    url : "./clientindex/serachbyname.php",
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
            const redirectButton = document.getElementById('addclinetbtn');

            
            redirectButton.addEventListener('click', function() {
                
                window.location.href = 'ajclient.php';
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
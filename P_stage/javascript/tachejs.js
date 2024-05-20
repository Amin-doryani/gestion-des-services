window.onload = function() {
    var div4 = document.getElementById("clients");
    var div2 = document.getElementById("admin");
    var div3 = document.getElementById("services");
    var div1 = document.getElementById("taches");

    
    div1.classList.add("wearein");
    div2.classList.remove("wearein");
    div3.classList.remove("wearein");
    div4.classList.remove("wearein");

};
var pagenum = document.getElementById('numpage').innerHTML;
var thenumis = parseInt(pagenum,10)
console.log(thenumis);
var ofsetval = 8;
            $('#morebtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./tacheindex/getmore.php",
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
                    url : "./tacheindex/getless.php",
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
                    url : "./tacheindex/serachbyname.php",
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
            
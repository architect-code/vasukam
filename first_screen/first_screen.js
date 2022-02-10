    var parent = $("#two_back");
     var imgs = parent.children();
     while (imgs.length) {
                parent.append(imgs.splice(Math.floor(Math.random() * imgs.length), 1)[0]);
        }
        $('#action_part').load('first_screen.html');
    
    
    
    function mainback(){
        $('#action_part').load('first_screen.html', function(){
            document.getElementsByClassName("one_top_bar")[0].style.display = "none";
        });
    
    }
    
    
    
    function signup1(){
        $('#action_part').load('signup1.html', function() {
            
        document.getElementsByClassName("one_top_bar")[0].style.display = "flex";
        document.getElementsByClassName("signup")[0].style.display = "none";
        document.getElementsByClassName("login")[0].style.display = "flex";
        document.getElementsByClassName("back")[0].style.display = "flex";
    
        });}
    
        function login1(){
        $('#action_part').load('login.html', function() {
        document.getElementsByClassName("one_top_bar")[0].style.display = "flex";
        document.getElementsByClassName("signup")[0].style.display = "flex";
        document.getElementsByClassName("login")[0].style.display = "none";
        document.getElementsByClassName("back")[0].style.display = "flex";
    
        });}

    $('.pop_up_group_info').on('click', function(){
        var group_location = $(":first-child", this);
        var group_id = group_location.html();
        var group_name = $(":nth-child(3)", this).text();
        // console.log(group_id);
        // console.log(group_name);
    
        $.ajax({
                url: "new_post_section/new_post.php",
                type: "post",
                data: {
                    'group_check' : 1,
                    'group_id' : group_id,
                },
    
                success: function(response){
                    console.log(response);
                    if(response.trim() == "group_set"){
                        console.log("response");
                        document.getElementById("pop_up_body_group").style.display = "none";
                        // document.getElementById("post_group_name").text("hello");
                        $('#post_group_name').text(group_name);
                    }
    
                    else if(response = "failed"){
    
                        console.log("some error occured please login");
                    }}
    });
    
        });

        window.onclick = function(event) {
            // console.log("something clicked");
            // if (event.target == document.getElementsByClassName("pop_up_close")[0]){
            //     document.getElementsByClassName("pop_up_body")[0].style.display = "none";
            // }
            if (event.target == document.getElementById("pop_up_grp_main")) {
                // console.log("pop up body clicked");
                document.getElementById("pop_up_body_group").style.display = "none";
            }
        
          
          }
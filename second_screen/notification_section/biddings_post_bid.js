function close_pop_up_bid_offer(){
    document.getElementById("pop_up_marketplace"),innerHTML = "";
    document.getElementById("pop_up_marketplace").style.display="none";
}

function accept_bid_offer(accept){
    var bid_id =  accept.firstElementChild.innerHTML;
    // console.log(bid_id);
   
    $.ajax({
        url: 'notification_section/bid_accept_reject.php',
        type: 'post',
        data: {
            'accept_bid_offer' : 1,
            'bid_id': bid_id,

        },

        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
                location.href = "second_screen.php";
            }

            else if(response.trim() == "less balance"){
                document.getElementById("pop_up_marketplace"),innerHTML = "";
                document.getElementById("pop_up_marketplace").style.display="none";
                alert("low balance");
            }

            else{
                document.getElementById("pop_up_marketplace"),innerHTML = "";
                document.getElementById("pop_up_marketplace").style.display="none";
                alert("some error occured");
                location.href = "second_screen.php";

            }
        
         }

    });


}

function reject_bid_offer(reject){
    console.log("clicked");
    var bid_id =  reject.firstElementChild.innerHTML;
    console.log(bid_id);
   
    $.ajax({
        url: 'notification_section/bid_accept_reject.php',
        type: 'post',
        data: {
            'reject_bid_offer' : 1,
            'bid_id': bid_id,

        },

        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
                location.href = "second_screen.php";
            }

            else{
                document.getElementById("pop_up_marketplace"),innerHTML = "";
                document.getElementById("pop_up_marketplace").style.display="none";
                alert("some error occured");
                location.href = "second_screen.php";

            }
        
         }

    });

}
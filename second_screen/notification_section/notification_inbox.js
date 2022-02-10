function show_bidding_detail(bid_det){
    console.log("bidd");
    var bid_id =  bid_det.firstElementChild.innerHTML;
    console.log(bid_id);
    $.ajax({
        url: 'notification_section/biddings_post_bid.php',
        type: 'post',
        data: {
            'see_offer' : 1,
            'bid_id': bid_id,
        },

        success: function(response){
            // console.log(response);
            if(response.trim() == "error"){
                alert("some error occured");
                location.href = 'second_screen.php';
            }
            else{
                console.log("open_bidding");
            document.getElementById("pop_up_marketplace").innerHTML = "";
            document.getElementById("pop_up_marketplace").innerHTML = response;
            document.getElementById("pop_up_marketplace").style.display="flex";

            }
     
         }

    });
}
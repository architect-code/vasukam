console.log("marketPlace launch");

function sell_post(sell){
    var sell_parent = sell.parentNode;
    var post_id =  sell_parent.lastElementChild.innerHTML;
    console.log(post_id);
    $.ajax({
        url: 'home_section/pop_up_marketplace.php',
        type: 'post',
        data: {
            'set_price' : 1,
            'post_id': post_id,
        },

        success: function(response){
            // console.log(response);
            document.getElementById("pop_up_marketplace").innerHTML = "";
            document.getElementById("pop_up_marketplace").innerHTML = response;
            document.getElementById("pop_up_marketplace").style.display="flex";
         }

    });

}

function pop_up_marketplace_cancel(){
    document.getElementById("pop_up_marketplace"),innerHTML = "";
    document.getElementById("pop_up_marketplace").style.display="none";

}

function marketplace_button_set_price(){
    console.log('clicked');
    var set_price_str = $('#marketplace_value_set_price').val();
    var set_price = parseInt(set_price_str);
    console.log(set_price);
    if(isNaN(set_price) || set_price > 1000 || set_price < 10){
        alert("please select a value between 10 and 1000 VATS");
    }
    else{
        $.ajax({
            url: 'home_section/pop_up_marketplace.php',
            type: 'post',
            data: {
                'set_price_value' : 1,
                'post_price': set_price,
            },
    
            success: function(response){
                // console.log(response);
               if(response.trim() == "save"){
                location.href = "second_screen.php";
               }
               else{
                   alert("some error occured");
                   location.href = "second_screen.php";

               }
             }
    
        });

    }

}

function remove_sell_post(remove_sell){
    var remove_parent = remove_sell.parentNode;
    var post_id =  remove_parent.lastElementChild.innerHTML;
    console.log(post_id);
    $.ajax({
        url: 'home_section/pop_up_marketplace.php',
        type: 'post',
        data: {
            'remove_set_price' : 1,
            'post_id': post_id,
        },

        success: function(response){
            // console.log(response);
            if(response.trim() == "save"){
                location.href = "second_screen.php";
               }
               else{
                   alert("some error occured");
                   location.href = "second_screen.php";

               }
         }

    });

}

function make_offer_post(offer){
    var offer_parent = offer.parentNode;
    var post_id =  offer_parent.lastElementChild.innerHTML;
    var owner_id = offer_parent.children[1].innerHTML;

    $.ajax({
        url: 'home_section/pop_up_marketplace.php',
        type: 'post',
        data: {
            'make_offer' : 1,
            'post_id': post_id,
            'owner_id': owner_id,
        },

        success: function(response){
            // console.log(response);
            document.getElementById("pop_up_marketplace").innerHTML = "";
            document.getElementById("pop_up_marketplace").innerHTML = response;
            document.getElementById("pop_up_marketplace").style.display="flex";
         }

    });


}

function change_offer_post(offer){
    var offer_parent = offer.parentNode;
    var post_id =  offer_parent.lastElementChild.innerHTML;
    var owner_id = offer_parent.children[1].innerHTML;

    $.ajax({
        url: 'home_section/pop_up_marketplace.php',
        type: 'post',
        data: {
            'change_offer' : 1,
            'post_id': post_id,
            'owner_id': owner_id,
        },

        success: function(response){
            // console.log(response);
            document.getElementById("pop_up_marketplace").innerHTML = "";
            document.getElementById("pop_up_marketplace").innerHTML = response;
            document.getElementById("pop_up_marketplace").style.display="flex";
         }

    });


}

function marketplace_button_make_offer(){
    console.log('clicked');
    var make_offer_str = $('#marketplace_value_make_offer').val();
    var make_offer = parseInt(make_offer_str);
    console.log(make_offer);
    if(isNaN(make_offer) || make_offer > 1000 || make_offer < 10){
        alert("please select a value between 10 and 1000 VATS");
    }
    else{
        $.ajax({
            url: 'home_section/pop_up_marketplace.php',
            type: 'post',
            data: {
                'make_offer_value' : 1,
                'offer_value': make_offer,
            },
    
            success: function(response){
                // console.log(response);
               if(response.trim() == "save"){
                console.log("offer made");
                document.getElementById("pop_up_marketplace").innerHTML = "";
                document.getElementById("pop_up_marketplace").style.display="none";
                location.href = "second_screen.php";
               }
               else{
                   alert("some error occured");
                   location.href = "second_screen.php";

               }
             }
    
        });

    }

}

function buy_post(buy_post){
    var buy_parent = buy_post.parentNode;
    var post_id =  buy_parent.lastElementChild.innerHTML;
    var owner_id = buy_parent.children[2].innerHTML;
    var ask_price_value = buy_parent.children[1].innerHTML;
    // console.log(owner_id);
    // console.log(post_id);
    // console.log(ask_price_value);
   
    $.ajax({
        url: 'home_section/pop_up_marketplace.php',
        type: 'post',
        data: {
            'buy_post' : 1,
            'post_id': post_id,
            'owner_id': owner_id,
            'ask_price_value': ask_price_value,
        },

        success: function(response){
            // console.log(response);
            if(response.trim() == "save"){
                location.href = "second_screen.php";
            }

            else if(response.trim() == "less balance"){
                alert("low balance");
            }

            else{
                alert("some error occured");
                location.href = "second_screen.php";

            }
        
         }

    });

}

function remove_offer(){
    console.log("remove_offer");
    $.ajax({
        url: 'home_section/pop_up_marketplace.php',
        type: 'post',
        data: {
            'remove_offer' : 1,
        },

        success: function(response){
            // console.log(response);
            if(response.trim() == "save"){
                location.href = "second_screen.php";
            }


            else{
                alert("some error occured");
                location.href = "second_screen.php";

            }
        
         }

    });

}



// $('#marketplace_button_set_price').on('click', function(){
//     console.log("clicked");
//     var set_price = $('#marketplace_value_set_price').val();
//     console.log(set_price);


// });



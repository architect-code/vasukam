<script src="new_post_section/new_post_image.js" type="text/javascript" defer></script>
<section class="pop_up_body" id="pop_up_body_group" style = "display:none">
            
</section>

        <section class="one_main_body">
        <section class="post_one_top_bar">
            <div class="post_two_cross"  id='go_back_from_post' onclick = 'go_back()'>
                <i class="fas fa-times"></i>
            </div>
            
            <div class="post_three_heading">
                <span>Image Post</span>
            </div>

        </section>
        <section class="post_two_top_bar">
            <div id="where_button" id="where_button">
                Choose a group <i class="fas fa-chevron-down"></i>
            </div>

        </section>

        <section class="post_three_body">
            <div class="post_five_where">
                <div class="post_six_where">
                    <i class="fas fa-times"></i> <span> Self </span>
                </div>


                <div class="post_six_where">
                    <i class="fas fa-times"></i> <span id="post_group_name"> Select a group </span>
                </div>
            </div>
            <div class = 'post_nine_data'>

            <div class="post_six_heading" id="post_six_heading" contentEditable>Enter post heading...</div>

            <div class="post_seven_body_image" id="post_seven_body_image">
                <input type="file" accept="image/*" name="image" multiple = "false" id="post_image_file" onchange="loadFile(event)" style="display: none;">
                <div class="upload_post_image" id="upload_post_image">
                    <label id="upload_post_image_button"  for="post_image_file" style="cursor: pointer;" >Upload Image</label></p>
                </div>
                <div class="post_image" id="post_image">
                    <img id="output"/>
                </div>



            </div>
</div>

        </section>


        <section class="post_four_post" id="post_four_post">
            <div>
                Post
            </div>

        </section>
    </section>
          

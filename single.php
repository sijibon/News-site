<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php
                    // include "config.php";
                    // $post_id = $_GET['id'];
                    // $sql = "SELECT * FROM post 
                    // LEFT JOIN category ON post.category = category_id
                    // LEFT JOIN user ON post.author = user.user_id 
                    // WHERE post.post_id = {$post_id}";
                    
                    //  $result = mysqli_query($conn, $sql) or die("Query failed");
                    //  if(mysqli_num_rows($result) > 0){     
                    //     while($row = mysqli_fetch_assoc($result)){
                      
                     ?>
                    
                        <div class="post-content single-post">
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    Html
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'>Admin</a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    01 Nov, 2019
                                </span>
                            </div>
                            <img class="single-feature-image" src="images/post_1.jpg" alt=""/>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            </p>
                        </div>

                        <?php 
                        //      }
                        //   }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>

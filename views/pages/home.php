<!DOCTYPE html>
<html>
	<head>
	  <title>Home</title>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	  <link href="assets/stylesheets/lib/jquery-ui.css" rel="stylesheet" />
	  <link href="assets/stylesheets/lib/bootstrap.css" rel="stylesheet" />
	  <link href="assets/stylesheets/question_styles.css" rel="stylesheet" />
	  <link href="assets/stylesheets/news.css" rel="stylesheet" />
	  <link href="assets/stylesheets/common.css" rel="stylesheet" />
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand">
	                    GlobalChat
	                    <!-- @*<img src="~/images/logo.png" class="logo" alt="Curiox" />*@ -->
	                </a><link href="assets/stylesheets/news.css" rel="stylesheet" />
	            </div>
	            <div class="navbar-collapse collapse">
	                <!-- @*navigation bar*@ -->
	                <ul class="nav navbar-nav">
	                    <li><a href="index.php?controller=pages&action=home">Home</a></li>
	                    <li><a>about</a></li>
	                    <li><a>contact</a></li>
	                    <li><a>news</a></li>
	                    <li><a href="index.php?controller=users&action=logout">logout</a></li>
	                </ul>
	                <!-- @*end nav bar*@ -->
	                <!-- @*search bar*@
	                @*<form class="navbar-form navbar-left" action="/action_page.php">
	                    <div class="input-group">
	                        <input type="text" class="form-control" placeholder="Search">
	                        <div class="input-group-btn">
	                            <button class="btn btn-default" type="submit">
	                                <i class="glyphicon glyphicon-search"></i>
	                            </button>
	                        </div>
	                    </div>
	                </form>*@
	                @*end search*@  -->
	                <!-- @*form log in and sign up*@ -->
	                <ul id="user-box" class="nav navbar-nav navbar-right">

	                </ul>
	                <!-- @*end form*@ -->
	                
	            </div>
	        </div>
		</nav>
		<div class="container">
	        <div class="row">
	            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 hidden-xs hidden-sm" style="height: 100%;">
	                <div class="news-category main-nav">
	                    <ul class="menu-parent">
	                    	<!-- bind hashtag here -->

	                        <!-- @foreach (var category in Model.Categories)
	                        {
	                            <li class="nav-item">
	                                <a class="label-item" asp-controller="Home" asp-action="Category" asp-route-category="@category.Name">
	                                    <div class="icon-nav">
	                                        @* Icons go here. However there need to be a place to store these icons first.*@
	                                        @*<i class="fas fa-rss-square icon-size"></i>*@
	                                    </div>
	                                    <div class="label-item">
	                                       #@category.Name
	                                    </div>
	                                </a>
	                            </li>
	                        } -->

	                        <?php
	                        foreach($hashtags as $hashtag_obj) {
	                        	$hashtag_name = $hashtag_obj->hashtag_name;
	                        	$hashtag_id = $hashtag_obj->hashtag_id;

	                        	echo 
	                        	"<li class=\"nav-item\">
	                                <a class=\"label-item\" href=\"index.php?controller=pages&action=group&hashtag_id=$hashtag_id\">
	                                    <div class=\"label-item\">
	                                       #$hashtag_name
	                                    </div>
	                                </a>
	                            </li>";
	                    	}
	                        ?>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">    
	                <!-- <div class="news-main">
	                    
	                </div> -->
	                <div>
                    <?php 
                    // echo $status
                    ?>
                    </div>

		            <div class="question-container page-header">

		                <!-- Topic bar
		                <div class="topic-bar">
		                    <div class="topic-tag">
		                        <a href="#">#@Model.Category</a>
		                    </div>
		                </div> -->

		                <!--Question content-->
		                <div class="question-content">
		                    <div>
		                        <div>
		                            <h1 class="question-content-text">GLOBAL</h1>
		                            <!-- <div>
		                                <p style="font-size:1.1em">
		                                    
		                                </p>
		                            </div> -->
		                            <!-- <div class="question-info">
		                                <div class="poster">
		                                    <small>by <strong>@Model.UserName</strong> on @Model.DateCreated</small>
		                                </div>
		                                <hr />
		                                <h3><strong>@Model.Answer.Count() answers</strong></h3>
		                            </div> -->
		                        </div>
		                    </div>
		                </div>
		                
		                <?php
		                foreach($messages as $message_obj)
		                {                  
		                  $full_name = $message_obj->full_name;
		                  $message = $message_obj->message;
		                  $mess_time = $message_obj->mess_time;
						  $message_id = $message_obj->message_id;
						  $hashtag_names = $message_obj->hashtag_names;

						  	echo 
						    "<div class=\"page-header\">
		                        <h3><strong class=\"answer-author\"> $message </strong></h3>
		                        <div class=\"poster\">
		                          <small>Answered on $mess_time</small>
		                        </div>
		                        <p class=\"anwser-content\">
		                        Message by $full_name
								</p>";

							foreach($hashtag_names as $hashtag_name){
								echo
								"<div class=\"topic-bar\">
									<div class=\"topic-tag\">
										<a href=\"#\">$hashtag_name</a>
									</div>
								</div>";
							}
							
							echo "</div>";
		                }
		                ?>
		                <!--Answer box-->
		                <!-- <hr>
		                <div class="form-container">
		                    <form method="post" action="index.php?controller=pages&action=home">
		                        <div class="form-group">
		                            <label><h3><strong>Your Message</strong></h3></label>
		                            <textarea id="contentAnswer" class="form-control" placeholder="Enter your answer" rows="4" name="message"></textarea>
		                        </div>
		                        <div class="form-group">
		                            <input type="submit" name="submit-answer-btn" value="Submit" id="btnSubmit" class="btn" />
		                        </div>
		                    </form>
		                </div> -->

		                <!-- <div class="form-container">
		                    <form method="get" action="index.php?controller=pages&action=group">
		                        <div class="form-group">
		                            <label><h3><strong>Your Id</strong></h3></label>
		                            <textarea id="contentAnswer" class="form-control" placeholder="Enter your answer" rows="4" name="message"></textarea>
		                            <input type=text name="id" class="form-controller" placeholder="ID" />
		                        </div>
		                        <div class="form-group">
		                            <input type="submit" name="submit-answer-btn" value="Submit" id="btnSubmitId" class="btn" />
		                        </div>
		                    </form>
		                </div> -->
                        <!--Answer box-->
                        <hr>
                        <div class="form-container">
                            <form method="post" action="index.php?controller=pages&action=home">
                                <div class="form-group">
                                    <label><h3><strong>Your Message</strong></h3></label>
                                    <textarea id="contentAnswer" class="form-control" placeholder="Enter your answer" rows="4" name="message"></textarea>
                                </div>
								<div class="form-group">
									<input type="text" name="hashtag_name" class="form-control" placeholder="#Hashtag"/>
								</div>
								<div class="form-group">
									<input type="submit" name="submit-answer-btn" value="Submit" id="btnSubmit" class="btn" />
								</div>
                            </form>
                        </div>
		            </div>
	            </div>
	            <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3" style="height: 100%;">

	            </div>
	        </div>
	    </div>
	</body>
</html>
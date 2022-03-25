<?php require_once "Dao.php"?>
<div class="testimonials">
        <section role="main">
            <article id="testimonial-of-the-day">
                <header>
                    <h2 class="post-title">
                            What People are Saying...
                    </h2>
                </header>
            </article>
        </section>
</div> 
<div class="comment-form", id="Login2">     
        <form name="commentForm" action="comment_handler.php" method="POST">
                            <div>Leave a comment: <input type="text" name="comment"></div>
                            <div>
                                <input type="submit" name="commentButton" value="Submit">
                            </div>
                            <input type="hidden" name="form" value="comment">
        </form>
</div>

<div class="comment-box">
    <div class="dialogbox">
        <div class="body">
            <span class="tip tip-up"></span>
            <div class="message">
                    <?php
                        $dao = new Dao();
                        $comments = $dao->getComments();
                        foreach ($comments as $comment) {
                            echo "<p>" . $comment["comment"] . "-" . $comment["username"] . "</p>";
                            // . - $comment["username"] . "</span>";
                        }
                    ?>
            </div>
        </div>
    </div>
</div>

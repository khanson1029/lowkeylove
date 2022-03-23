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

    <div class="comment-box">
        <div class="dialogbox">
            <div class="body">
                <span class="tip tip-up"></span>
                <div class="message">
                    <form name="commentForm" action="comment_handler.php" method="POST">
                        <span>Leave a comment: <input type="text" name="comment"></span>
                        <div>
                            <input type="submit" name="commentButton" value="Submit">
                        </div>
                        <input type="hidden" name="form" value="comment">
                    </form>
                    <?php
                    $comments = $dao->getComments();
                    echo "<table>";
                    foreach ($comments as $comment) {
                    echo "<tr>";
                    echo "<td>" . $comment["comment"] . "</td>";
                    echo "<td>" . $comment["created"] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </div>